<?php

namespace App\Controller;

use App\Entity\Account;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/", name="news_index")
     */
    public function index()
    {
        /** @var Account $account */
        $account = $this->getUser();
        return $this->render('news/index.html.twig', ['account' => $account]);
    }
}
