<?php

namespace App\Controller;

use App\Entity\Account;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AbstractOtsController extends AbstractController
{
    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->getUser();
    }
}
