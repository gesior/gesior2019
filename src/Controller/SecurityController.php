<?php

namespace App\Controller;

use App\Form\Security\WebsiteLoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(WebsiteLoginType::class);

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'form' => $form->createView()]);
    }

    /**
     * @Route("/logout", name="security_after_logout")
     */
    public function logout(): Response
    {
        return $this->render('security/logout.html.twig', []);
    }
}
