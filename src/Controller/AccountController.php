<?php

namespace App\Controller;

use App\Entity\Account;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account_index")
     */
    public function index()
    {
        /** @var Account $account */
        $account = $this->getUser();
        return $this->render('account/index.html.twig', ['account' => $account]);
    }
}
