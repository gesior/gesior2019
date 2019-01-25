<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerRefferals
 *
 * @ORM\Table(name="player_refferals")
 * @ORM\Entity
 */
class PlayerRefferal
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="account_id", type="integer", nullable=true)
     */
    private $accountId = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="refferal_id", type="integer", nullable=true)
     */
    private $refferalId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="player_ip", type="integer", nullable=false)
     */
    private $playerIp = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    public function setAccountId(?int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getRefferalId(): ?int
    {
        return $this->refferalId;
    }

    public function setRefferalId(?int $refferalId): self
    {
        $this->refferalId = $refferalId;

        return $this;
    }

    public function getPlayerIp(): ?int
    {
        return $this->playerIp;
    }

    public function setPlayerIp(int $playerIp): self
    {
        $this->playerIp = $playerIp;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }


}
