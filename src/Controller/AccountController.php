<?php

namespace App\Controller;

use App\Form\Account\ChangePasswordModel;
use App\Form\Account\ChangePasswordType;
use App\Form\Account\ChangePublicInformationType;
use App\Security\OtsSecurityService;
use App\Service\AccountService;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractOtsController
{
    private $entityManager;
    private $accountService;
    private $otsSecurityService;
    private $mailerService;

    public function __construct(EntityManagerInterface $entityManager, AccountService $accountService,
                                OtsSecurityService $otsSecurityService, MailerService $mailerService)
    {
        $this->entityManager = $entityManager;
        $this->accountService = $accountService;
        $this->otsSecurityService = $otsSecurityService;
        $this->mailerService = $mailerService;
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
                    $this->addFlash('success', 'ACCOUNT.CHANGE_PASSWORD.MAIL_SENT');
                } catch (LogicException $mailerException) {
                    $this->addFlash('warning', $mailerException->getMessage());
                }

                $this->addFlash('success', 'ACCOUNT.CHANGE_PASSWORD.AFTER_CHANGE_MESSAGE');
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

            $this->addFlash('success', 'ACCOUNT.CHANGE_PUBLIC_INFORMATION.AFTER_CHANGE_MESSAGE');
            return $this->redirectToRoute('account_index');
        }

        return $this->render('account/changePublicInformation.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
