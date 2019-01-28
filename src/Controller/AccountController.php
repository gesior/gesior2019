<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\Account\ChangePasswordModel;
use App\Form\Account\ChangePasswordType;
use App\Form\Account\ChangePublicInformationType;
use App\Form\Account\Character\EditInformationType;
use App\Security\OtsSecurityService;
use App\Service\AccountService;
use App\Service\MailerService;
use App\Service\TranslatorTrait;
use Doctrine\ORM\EntityManagerInterface;
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

    public function __construct(EntityManagerInterface $entityManager, AccountService $accountService,
                                OtsSecurityService $otsSecurityService, MailerService $mailerService,
                                TranslatorInterface $translator)
    {
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

            $this->addFlash('success', $this->translate('ACCOUNT.CHANGE_PUBLIC_INFORMATION.AFTER_CHANGE_MESSAGE'));
            return $this->redirectToRoute('account_index');
        }

        return $this->render('account/changePublicInformation.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/character/editInformation/{id}", name="account_character_edit")
     * @param Player $player
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function characterEdit(Request $request, Player $player)
    {
        if ($this->getAccount() !== $player->getAccount()) {
            $this->addFlash('error', $this->translate('ACCOUNT.CHARACTER.EDIT_INFORMATION.CHARACTER_FROM_OTHER_ACCOUNT'));
            return $this->redirectToRoute('account_index');
        }

        $form = $this->createForm(EditInformationType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($player);
            $this->entityManager->flush();

            $this->addFlash('success',
                $this->translate('ACCOUNT.CHARACTER.EDIT_INFORMATION.AFTER_CHANGE_MESSAGE', ['%name%' => $player->getName()])
            );
            return $this->redirectToRoute('account_index');
        }

        return $this->render('account/character/editInformation.html.twig', [
            'form' => $form->createView(),
            'player' => $player
        ]);
    }
}
