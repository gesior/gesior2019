<?php

namespace App\Controller;

use App\Form\Account\ChangePasswordModel;
use App\Form\Account\ChangePasswordType;
use App\Form\Account\ChangePublicInformationType;
use App\Form\Account\CreateAccountModel;
use App\Form\Account\CreateAccountType;
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
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class AccountController extends AbstractOtsController
{
    use TranslatorTrait;

    private $entityManager;
    private $accountService;
    private $otsSecurityService;
    private $mailerService;
    private $translator;

    public function __construct(
        EntityManagerInterface $entityManager,
        AccountService $accountService,
        OtsSecurityService $otsSecurityService,
        MailerService $mailerService,
        TranslatorInterface $translator
    ) {
        $this->entityManager = $entityManager;
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
