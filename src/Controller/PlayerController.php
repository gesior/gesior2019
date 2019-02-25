<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\Player\EditInformationType;
use App\Form\Player\CreatePlayerModel;
use App\Form\Player\CreatePlayerType;
use App\Security\OtsSecurityService;
use App\Service\AccountService;
use App\Service\MailerService;
use App\Service\PlayerService;
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

class PlayerController extends AbstractOtsController
{
    use TranslatorTrait;

    private $entityManager;
    private $accountService;
    private $playerService;
    private $otsSecurityService;
    private $mailerService;
    private $translator;

    public function __construct(
        EntityManagerInterface $entityManager,
        AccountService $accountService,
        PlayerService $playerService,
        OtsSecurityService $otsSecurityService,
        MailerService $mailerService,
        TranslatorInterface $translator
    ) {
        $this->entityManager = $entityManager;
        $this->accountService = $accountService;
        $this->playerService = $playerService;
        $this->otsSecurityService = $otsSecurityService;
        $this->mailerService = $mailerService;
        $this->translator = $translator;
    }

    /**
     * @Route("/player", name="player_index")
     */
    public function index()
    {
        return $this->render('account/index.html.twig', [
            'account' => $this->getAccount(),
        ]);
    }

    /**
     * @Route("/player/editInformation/{id}", name="player_edit")
     * @param Player $player
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editInformation(Request $request, Player $player)
    {
        if ($this->getAccount() !== $player->getAccount()) {
            $this->addFlash('error',
                $this->translate('PLAYER.EDIT_INFORMATION.PLAYER_FROM_OTHER_ACCOUNT'));
            return $this->redirectToRoute('account_index');
        }

        $form = $this->createForm(EditInformationType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($player);
            $this->entityManager->flush();

            $this->addFlash('success',
                $this->translate('PLAYER.EDIT_INFORMATION.AFTER_CHANGE_MESSAGE',
                    ['%name%' => $player->getName()])
            );
            return $this->redirectToRoute('account_index');
        }

        return $this->render('player/editInformation.html.twig', [
            'form' => $form->createView(),
            'player' => $player
        ]);
    }

    /**
     * @Route("/player/delete", name="player_delete")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function deleteCharacter(Request $request, Player $player)
    {
        /*
        if ($this->getAccount() !== $player->getAccount()) {
            $this->addFlash('error', $this->translate('PLAYER.EDIT_INFORMATION.PLAYER_FROM_OTHER_ACCOUNT'));
            return $this->redirectToRoute('account_index');
        }

        $form = $this->createForm(EditInformationType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($player);
            $this->entityManager->flush();

            $this->addFlash('success',
                $this->translate('PLAYER.EDIT_INFORMATION.AFTER_CHANGE_MESSAGE', ['%name%' => $player->getName()])
            );
            return $this->redirectToRoute('account_index');
        }

        return $this->render('player/editInformation.html.twig', [
            'form' => $form->createView(),
            'player' => $player
        ]);
        */
    }

    /**
     * @Route("/player/undelete", name="player_undelete")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function undeleteCharacter(Request $request, Player $player)
    {
        /*
        if ($this->getAccount() !== $player->getAccount()) {
            $this->addFlash('error', $this->translate('PLAYER.EDIT_INFORMATION.PLAYER_FROM_OTHER_ACCOUNT'));
            return $this->redirectToRoute('account_index');
        }

        $form = $this->createForm(EditInformationType::class, $player);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($player);
            $this->entityManager->flush();

            $this->addFlash('success',
                $this->translate('PLAYER.EDIT_INFORMATION.AFTER_CHANGE_MESSAGE', ['%name%' => $player->getName()])
            );
            return $this->redirectToRoute('account_index');
        }

        return $this->render('player/editInformation.html.twig', [
            'form' => $form->createView(),
            'player' => $player
        ]);
        */
    }

    /**
     * @Route("/player/newNameTest", name="player_new_name_test")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function nameTest(Request $request)
    {
        $name = $request->query->get('playerName');

        $formattedName = $this->playerService->reformatName($name);
        $error = $this->playerService->validateNameFormat($name);

        return $this->json(
            [
                'formattedName' => $formattedName,
                'error' => $error,
            ]
        );
    }

    /**
     * @Route("/player/create", name="player_create")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function createCharacter(Request $request)
    {
        $characterModel = new CreatePlayerModel();
        $form = $this->createForm(CreatePlayerType::class, $characterModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $newPlayer = $this->playerService->createPlayer(
                    $characterModel->getName(),
                    $characterModel->getSex(),
                    $characterModel->getVocationId(),
                    $characterModel->getTownId()
                );

                $this->entityManager->persist($newPlayer);
                $this->entityManager->flush();

                $this->addFlash('success',
                    $this->translate('PLAYER.CREATE.AFTER_CREATE_MESSAGE',
                        ['%name%' => $newPlayer->getName()])
                );
                return $this->redirectToRoute('account_index');
            } catch (Exception $createCharacterException) {
                $form->addError(new FormError($createCharacterException->getMessage()));
            }
        }

        return $this->render('player/create.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
