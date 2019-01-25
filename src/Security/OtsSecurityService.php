<?php

namespace App\Security;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class OtsSecurityService
{
    const ACCESS_TYPE_IP = 1;
    const ACCESS_TYPE_ACCOUNT = 2;
    const ACCESS_TYPE_PLAYER = 3;

    const ACTION_LOGIN = 1;
    const ACTION_EDIT = 2;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getUser()
    {
        //$user = $this->entityManager->getRepository(Account::class)->findOneBy(['name' => $credentials['name']]);

    }

    /**
     * @param UserInterface $account
     * @param string $password
     * @return string
     */
    public function encryptPassword(UserInterface $account, string $password)
    {
        return sha1($password);
    }

    /**
     * @param UserInterface $account
     * @param string $password
     * @return bool
     */
    public function isValidPassword(UserInterface $account, string $password)
    {
        return $account->getPassword() == $this->encryptPassword($account, $password);
    }

    /**
     * @param UserInterface $account
     * @param string $token
     * @return bool
     */
    public function isValidToken(UserInterface $account, string $token)
    {
        return true;
    }
}
