<?php

namespace App\Form\Account;

use Symfony\Component\Validator\Constraints as Assert;

class ChangePublicInformationModel
{
    /**
     * @var string
     * @Assert\Length(max=255)
     */
    protected $realName = '';

    /**
     * @var string
     * @Assert\Length(max=255)
     */
    protected $location = '';

    /**
     * @var string
     * @Assert\Length(max=2)
     */
    protected $flag = '';

    /**
     * @return string
     */
    public function getRealName(): string
    {
        return $this->realName;
    }

    /**
     * @param string $realName
     */
    public function setRealName(string $realName): void
    {
        $this->realName = $realName;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getFlag(): string
    {
        return $this->flag;
    }

    /**
     * @param string $flag
     */
    public function setFlag(string $flag): void
    {
        $this->flag = $flag;
    }

}