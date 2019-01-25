<?php

namespace App\Controller;

use App\Form\Security\WebsiteLoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
    public function login(AuthenticationUtils $authenticationUtils)
    {
        if ($this->isGranted('ROLE_USER')) {
            return new RedirectResponse($this->generateUrl('account_index'));
        }
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(WebsiteLoginType::class);

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'form_login' => $form->createView()]);
    }

    /**
     * @Route("/logout", name="security_after_logout")
     */
    public function logout()
    {
        return $this->render('security/logout.html.twig', []);
    }
}
