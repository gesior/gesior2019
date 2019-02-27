<?php

namespace App\Form\Account;

class TwoFactorAuthenticationModel
{
    /** @var string */
    protected $currentPassword = '';
    /** @var string */
    protected $recoveryKey = '';

    /**
     * @return string
     */
    public function getCurrentPassword(): string
    {
        return $this->currentPassword;
    }

    /**
     * @param string $currentPassword
     */
    public function setCurrentPassword(string $currentPassword): void
    {
        $this->currentPassword = $currentPassword;
    }

    /**
     * @return string
     */
    public function getRecoveryKey(): string
    {
        return $this->recoveryKey;
    }

    /**
     * @param string $recoveryKey
     */
    public function setRecoveryKey(string $recoveryKey): void
    {
        $this->recoveryKey = $recoveryKey;
    }

}
