<?php

namespace App\Security;

use App\Entity\Account;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Sonata\GoogleAuthenticator\GoogleAuthenticator;

class OtsSecurityService
{
    const ACCESS_TYPE_IP = 1;
    const ACCESS_TYPE_ACCOUNT = 2;
    const ACCESS_TYPE_PLAYER = 3;

    const ACTION_LOGIN = 1;
    const ACTION_EDIT = 2;

    const SECRET_LENGTH = 10;
    const TOKEN_LENGTH = 6;

    private $entityManager;
    private $googleAuthenticator;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->googleAuthenticator = new GoogleAuthenticator(self::TOKEN_LENGTH, self::SECRET_LENGTH);
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
     * @param UserInterface|Account $account
     * @return bool
     */
    public function isTokenRequired(UserInterface $account)
    {
        return $account->getSecret() && !empty($account->getSecret());
    }


    /**
     * @param UserInterface|Account $account $account
     * @param string $token
     * @return bool
     */
    public function isValidToken(UserInterface $account, string $token)
    {
        if (!empty($account->getSecret())) {
            return $this->googleAuthenticator->checkCode($account->getSecret(), $token);
        } else {
            return true;
        }
    }

}
