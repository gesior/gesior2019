<?php

namespace App\Controller;

use App\Form\Account\TwoFactorAuthenticationDisableType;
use App\Form\Account\TwoFactorAuthenticationModel;
use App\Form\Account\ChangePasswordModel;
use App\Form\Account\ChangePasswordType;
use App\Form\Account\ChangePublicInformationType;
use App\Form\Account\CreateAccountModel;
use App\Form\Account\CreateAccountType;
use App\Form\Account\TwoFactorAuthenticationEnableType;
use App\Form\Account\TwoFactorAuthenticationViewType;
use App\Security\OtsSecurityService;
use App\Service\AccountService;
use App\Service\MailerService;
use App\Service\TranslatorTrait;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use LogicException;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class AccountController extends AbstractOtsController
{
    use TranslatorTrait;

    const VIEW_QR_SESSION_KEY = 'view_qr_once';

    private $entityManager;
    private $session;
    private $accountService;
    private $otsSecurityService;
    private $mailerService;
    private $translator;

    public function __construct(
        EntityManagerInterface $entityManager,
        SessionInterface $session,
        AccountService $accountService,
        OtsSecurityService $otsSecurityService,
        MailerService $mailerService,
        TranslatorInterface $translator
    ) {
        $this->entityManager = $entityManager;
        $this->session = $session;
        $this->accountService = $accountService;
        $this->otsSecurityService = $otsSecurityService;
        $this->mailerService = $mailerService;
        $this->translator = $translator;
    }

    /**
     * @Route("/account", name="account_index")
     */
    public function index()
    {
        return $this->render('account/index.html.twig', [
            'account' => $this->getAccount(),
        ]);
    }

    /**
     * @Route("/account/changePassword", name="account_change_password")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function changePassword(Request $request)
    {
        $changePasswordModel = new ChangePasswordModel();

        $form = $this->createForm(ChangePasswordType::class, $changePasswordModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $account = $this->getAccount();

            try {
                $this->accountService->changePassword(
                    $account,
                    $changePasswordModel->getCurrentPassword(),
                    $changePasswordModel->getNewPassword()
                );

                $this->entityManager->persist($account);
                $this->entityManager->flush();

                try {
                    $this->mailerService->sendChangePassword($account, $changePasswordModel->getNewPassword());
                    $this->addFlash('success', $this->translate('ACCOUNT.CHANGE_PASSWORD.MAIL_SENT'));
                } catch (LogicException $mailerException) {
                    $this->addFlash('warning', $mailerException->getMessage());
                }

                $this->addFlash('success', $this->translate('ACCOUNT.CHANGE_PASSWORD.AFTER_CHANGE_MESSAGE'));
                return $this->redirectToRoute('account_index');
            } catch (LogicException $changePasswordException) {
                $form->addError(new FormError($changePasswordException->getMessage()));
            }
        }

        return $this->render('account/changePassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/viewQrCode", name="account_viewQrCode")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function viewQrCode(Request $request)
    {
        $twoFactorAuthenticationModel = new TwoFactorAuthenticationModel();

        $form = $this->createForm(TwoFactorAuthenticationViewType::class, $twoFactorAuthenticationModel);
        $form->handleRequest($request);

        $account = $this->getAccount();

        if (empty($account->getKey())) {
            $this->addFlash('warning', $this->translate('ACCOUNT.VIEW_QR.RECOVERY_KEY_REQUIRED'));
            return $this->redirectToRoute('account_index');
        }

        if (empty($account->getSecret())) {
            $this->addFlash('warning', $this->translate('ACCOUNT.VIEW_QR.2FA_DISABLED'));
            return $this->redirectToRoute('account_index');
        }

        if ($form->isSubmitted() && $form->isValid()) {
            if ($this->otsSecurityService->isValidPassword($account,
                    $twoFactorAuthenticationModel->getCurrentPassword()) &&
                $this->otsSecurityService->isValidRecoveryKey($account,
                    $twoFactorAuthenticationModel->getRecoveryKey())
            ) {
                $this->session->set(self::VIEW_QR_SESSION_KEY, 1);
            }
        }

        if ($this->session->get(self::VIEW_QR_SESSION_KEY) === 1) {
            $this->session->remove(self::VIEW_QR_SESSION_KEY);
            return $this->render('account/viewQrCode.html.twig', [
                'account' => $account,
            ]);
        } else {
            return $this->render('account/viewQrForm.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }

    /**
     * @Route("/account/enable2FA", name="account_enable2FA")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function enable2FA(Request $request)
    {
        $twoFactorAuthenticationModel = new TwoFactorAuthenticationModel();

        $form = $this->createForm(TwoFactorAuthenticationEnableType::class, $twoFactorAuthenticationModel);
        $form->handleRequest($request);

        $account = $this->getAccount();
        if (empty($account->getKey())) {
            $this->addFlash('warning', $this->translate('ACCOUNT.ENABLE_2FA.RECOVERY_KEY_REQUIRED'));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->accountService->enable2FA(
                    $account,
                    $twoFactorAuthenticationModel->getCurrentPassword(),
                    $twoFactorAuthenticationModel->getRecoveryKey()
                );

                $this->entityManager->persist($account);
                $this->entityManager->flush();

                try {
                    $this->mailerService->sendEnable2FA($account);
                    $this->addFlash('success', $this->translate('ACCOUNT.ENABLE_2FA.MAIL_SENT'));
                } catch (LogicException $mailerException) {
                    $this->addFlash('warning', $mailerException->getMessage());
                }

                $this->session->set(self::VIEW_QR_SESSION_KEY, 1);

                return $this->redirectToRoute('account_viewQrCode');
            } catch (LogicException $enable2FAException) {
                $form->addError(new FormError($enable2FAException->getMessage()));
            }
        }

        return $this->render('account/enable2FA.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/disable2FA", name="account_disable2FA")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function disable2FA(Request $request)
    {
        $twoFactorAuthenticationModel = new TwoFactorAuthenticationModel();

        $form = $this->createForm(TwoFactorAuthenticationDisableType::class, $twoFactorAuthenticationModel);
        $form->handleRequest($request);

        $account = $this->getAccount();
        if (empty($account->getKey())) {
            $this->addFlash('warning', $this->translate('ACCOUNT.DISABLE_2FA.RECOVERY_KEY_REQUIRED'));
        }

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->accountService->disable2FA(
                    $account,
                    $twoFactorAuthenticationModel->getCurrentPassword(),
                    $twoFactorAuthenticationModel->getRecoveryKey()
                );

                $this->entityManager->persist($account);
                $this->entityManager->flush();

                try {
                    $this->mailerService->sendDisable2FA($account);
                    $this->addFlash('success', $this->translate('ACCOUNT.DISABLE_2FA.MAIL_SENT'));
                } catch (LogicException $mailerException) {
                    $this->addFlash('warning', $mailerException->getMessage());
                }

                $this->addFlash('success', $this->translate('ACCOUNT.DISABLE_2FA.AFTER_DISABLE_MESSAGE'));
                return $this->redirectToRoute('account_index');
            } catch (LogicException $disable2FAException) {
                $form->addError(new FormError($disable2FAException->getMessage()));
            }
        }

        return $this->render('account/disable2FA.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/changeEmail", name="account_change_email")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function changeEmail(Request $request)
    {
        $changePasswordModel = new ChangePasswordModel();

        $form = $this->createForm(ChangePasswordType::class, $changePasswordModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $account = $this->getAccount();

            try {
                $this->accountService->changePassword(
                    $account,
                    $changePasswordModel->getCurrentPassword(),
                    $changePasswordModel->getNewPassword()
                );

                $this->entityManager->persist($account);
                $this->entityManager->flush();

                try {
                    $this->mailerService->sendChangePassword($account, $changePasswordModel->getNewPassword());
                    $this->addFlash('success', $this->translate('ACCOUNT.CHANGE_PASSWORD.MAIL_SENT'));
                } catch (LogicException $mailerException) {
                    $this->addFlash('warning', $mailerException->getMessage());
                }

                $this->addFlash('success', $this->translate('ACCOUNT.CHANGE_PASSWORD.AFTER_CHANGE_MESSAGE'));
                return $this->redirectToRoute('account_index');
            } catch (LogicException $changePasswordException) {
                $form->addError(new FormError($changePasswordException->getMessage()));
            }
        }

        return $this->render('account/changePassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/changePublicInformation", name="account_public_information")
     */
    public function changePublicInformation(Request $request)
    {
        $account = $this->getAccount();

        $form = $this->createForm(ChangePublicInformationType::class, $account);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($account);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                $this->translate('ACCOUNT.CHANGE_PUBLIC_INFORMATION.AFTER_CHANGE_MESSAGE')
            );

            return $this->redirectToRoute('account_index');
        }

        return $this->render('account/changePublicInformation.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/create", name="account_create")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function createAccount(Request $request)
    {
        $accountModel = new CreateAccountModel();
        $form = $this->createForm(CreateAccountType::class, $accountModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $newPlayer = $this->accountService->createAccount(

                    $accountModel->getName(),
                    $accountModel->getSex(),
                    $accountModel->getVocationId(),
                    $accountModel->getTownId()
                );

                $this->entityManager->persist($newPlayer);
                $this->entityManager->flush();

                $this->addFlash('success',
                    $this->translate('ACCOUNT.CREATE.AFTER_CREATE_MESSAGE',
                        ['%name%' => $newPlayer->getName()])
                );
                return $this->redirectToRoute('account_index');
            } catch (Exception $createAccountException) {
                $form->addError(new FormError($createAccountException->getMessage()));
            }
        }

        return $this->render('account/create.html.twig', [
            'form' => $form->createView()
        ]);

    }

}
