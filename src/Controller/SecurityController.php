<?php

namespace App\Controller;

use App\Entity\Account;
use App\Form\Security\WebsiteLoginType;
use App\Security\OtsSecurityService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller
 *
 * @Route("/security")
 */
class SecurityController extends AbstractController
{
    private $entityManager;
    private $otsSecurityService;

    public function __construct(EntityManagerInterface $entityManager, OtsSecurityService $otsSecurityService)
    {
        $this->entityManager = $entityManager;
        $this->otsSecurityService = $otsSecurityService;
    }

    /**
     * @Route("/login", name="security_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        if ($this->isGranted('ROLE_USER')) {
            return new RedirectResponse($this->generateUrl('account_index'));
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(
            WebsiteLoginType::class,
            [
                'name' => $lastUsername,
            ]
        );

        return $this->render(
            'security/login.html.twig',
            [
                'last_username' => $lastUsername,
                'error' => $error,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/isTokenRequired", name="security_is_token_required")
     * @param Request $request
     * @return JsonResponse
     */
    public function isTokenRequired(Request $request)
    {
        $accountName = $request->query->get('accountName');

        $account = $this->entityManager->getRepository(Account::class)->findOneByName($accountName);
        if ($account) {
            return $this->json(
                [
                    'accountName' => $account->getName(),
                    'tokenRequired' => $this->otsSecurityService->isTokenRequired($account),
                ]
            );
        } else {
            return $this->json(
                [
                    'accountName' => null,
                    'tokenRequired' => false,
                ]
            );
        }
    }

    /**
     * @Route("/logout", name="security_after_logout")
     */
    public function logout()
    {
        return $this->render('security/logout.html.twig', []);
    }

}
