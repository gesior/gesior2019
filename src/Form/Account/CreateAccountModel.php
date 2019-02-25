<?php

namespace App\Form\Account;


class CreateAccountModel
{
    /** @var string */
    protected $name = '';
    /** @var int */
    protected $sex = -1;
    /** @var int */
    protected $vocationId = -1;
    /** @var int */
    protected $townId = -1;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateAccountModel
     */
    public function setName(string $name): CreateAccountModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getSex(): int
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     * @return CreateAccountModel
     */
    public function setSex(int $sex): CreateAccountModel
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * @return int
     */
    public function getVocationId(): int
    {
        return $this->vocationId;
    }

    /**
     * @param int $vocationId
     * @return CreateAccountModel
     */
    public function setVocationId(int $vocationId): CreateAccountModel
    {
        $this->vocationId = $vocationId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTownId(): int
    {
        return $this->townId;
    }

    /**
     * @param int $townId
     * @return CreateAccountModel
     */
    public function setTownId(int $townId): CreateAccountModel
    {
        $this->townId = $townId;
        return $this;
    }

}
