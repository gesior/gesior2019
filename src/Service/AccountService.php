<?php

namespace App\Service;

use App\Entity\Account;
use App\Security\OtsSecurityService;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;
use Symfony\Contracts\Translation\TranslatorInterface;

class AccountService
{
    use TranslatorTrait;

    const PASSWORD_MINIMUM_LENGHT = 4;
    const PASSWORD_MAXIMUM_LENGHT = 20;

    private $entityManager;
    private $translator;
    private $otsSecurityService;

    public function __construct(
        EntityManagerInterface $entityManager,
        TranslatorInterface $translator,
        OtsSecurityService $otsSecurityService
    ) {
        $this->entityManager = $entityManager;
        $this->translator = $translator;
        $this->otsSecurityService = $otsSecurityService;
    }

    /**
     * @param string $name
     * @param string $password
     * @param string $email
     * @param string $creatorIp
     * @return Account
     */
    public function createAccount(string $name, string $password, string $email, string $creatorIp)
    {
        $account = new Account();
        $account->setName($name);
        $account->setPassword($this->otsSecurityService->encryptPassword($account, $password));
        $account->setEmail($email);
        $account->setCreateIp($creatorIp);

        return $account;
    }

    /**
     * @param Account $account
     * @param string $currentPassword
     * @param string $newPassword
     * @throws LogicException
     */
    public function changePassword(Account $account, string $currentPassword, string $newPassword)
    {
        if (!$this->otsSecurityService->isValidPassword($account, $currentPassword)) {
            throw new LogicException($this->translate('ACCOUNT.CHANGE_PASSWORD.INVALID_CURRENT_PASSWORD'));
        }

        if ($currentPassword == $newPassword) {
            throw new LogicException($this->translate('ACCOUNT.CHANGE_PASSWORD.NEW_PASSWORD_SAME_AS_OLD'));
        }

        $this->validatePasswordFormat($newPassword);

        $account->setPassword($this->otsSecurityService->encryptPassword($account, $newPassword));
    }

    /**
     * @param Account $account
     * @param string $currentPassword
     * @param string $recoveryKey
     * @throws LogicException
     */
    public function enable2FA(Account $account, string $currentPassword, string $recoveryKey)
    {
        if (!$this->otsSecurityService->isValidPassword($account, $currentPassword)) {
            throw new LogicException($this->translate('ACCOUNT.ENABLE_2FA.INVALID_CURRENT_PASSWORD'));
        }

        if (empty($account->getKey())) {
            throw new LogicException($this->translate('ACCOUNT.ENABLE_2FA.RECOVERY_KEY_REQUIRED'));
        }

        if (!$this->otsSecurityService->isValidRecoveryKey($account, $recoveryKey)) {
            throw new LogicException($this->translate('ACCOUNT.ENABLE_2FA.INVALID_RECOVERY_KEY'));
        }

        $account->setSecret($this->otsSecurityService->generateToken());
    }

    /**
     * @param Account $account
     * @param string $currentPassword
     * @param string $recoveryKey
     * @throws LogicException
     */
    public function disable2FA(Account $account, string $currentPassword, string $recoveryKey)
    {
        if (!$this->otsSecurityService->isValidPassword($account, $currentPassword)) {
            throw new LogicException($this->translate('ACCOUNT.DISABLE_2FA.INVALID_CURRENT_PASSWORD'));
        }

        if (empty($account->getKey())) {
            throw new LogicException($this->translate('ACCOUNT.DISABLE_2FA.RECOVERY_KEY_REQUIRED'));
        }

        if (!$this->otsSecurityService->isValidRecoveryKey($account, $recoveryKey)) {
            throw new LogicException($this->translate('ACCOUNT.DISABLE_2FA.INVALID_RECOVERY_KEY'));
        }

        $account->setSecret(null);
    }

    /**
     * @param string $password
     */
    private function validatePasswordFormat(string $password)
    {
        if (strlen($password) < self::PASSWORD_MINIMUM_LENGHT) {
            throw new LogicException($this->translate('ACCOUNT.INVALID_PASSWORD_FORMAT.TOO_SHORT',
                ['%min%' => self::PASSWORD_MINIMUM_LENGHT]));
        }

        if (strlen($password) > self::PASSWORD_MAXIMUM_LENGHT) {
            throw new LogicException($this->translate('ACCOUNT.INVALID_PASSWORD_FORMAT.TOO_LONG',
                ['%max%' => self::PASSWORD_MAXIMUM_LENGHT]));
        }
    }
}
