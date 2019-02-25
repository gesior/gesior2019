<?php

namespace App\Form\Player;

use Symfony\Component\Validator\Constraints as Assert;

class CreatePlayerModel
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
     * @return CreatePlayerModel
     */
    public function setName(string $name): CreatePlayerModel
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
     * @return CreatePlayerModel
     */
    public function setSex(int $sex): CreatePlayerModel
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
     * @return CreatePlayerModel
     */
    public function setVocationId(int $vocationId): CreatePlayerModel
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
     * @return CreatePlayerModel
     */
    public function setTownId(int $townId): CreatePlayerModel
    {
        $this->townId = $townId;
        return $this;
    }

}
