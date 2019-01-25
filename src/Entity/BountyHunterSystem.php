<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BountyHunterSystem
 *
 * @ORM\Table(name="bounty_hunter_system")
 * @ORM\Entity
 */
class BountyHunterSystem
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
     * @var int
     *
     * @ORM\Column(name="hunter_id", type="integer", nullable=false)
     */
    private $hunterId;

    /**
     * @var int
     *
     * @ORM\Column(name="target_id", type="integer", nullable=false)
     */
    private $targetId;

    /**
     * @var int
     *
     * @ORM\Column(name="killer_id", type="integer", nullable=false)
     */
    private $killerId;

    /**
     * @var int
     *
     * @ORM\Column(name="prize", type="bigint", nullable=false)
     */
    private $prize;

    /**
     * @var string
     *
     * @ORM\Column(name="currencyType", type="string", length=32, nullable=false)
     */
    private $currencytype;

    /**
     * @var int
     *
     * @ORM\Column(name="dateAdded", type="integer", nullable=false)
     */
    private $dateadded;

    /**
     * @var int
     *
     * @ORM\Column(name="killed", type="integer", nullable=false)
     */
    private $killed;

    /**
     * @var int
     *
     * @ORM\Column(name="dateKilled", type="integer", nullable=false)
     */
    private $datekilled;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHunterId(): ?int
    {
        return $this->hunterId;
    }

    public function setHunterId(int $hunterId): self
    {
        $this->hunterId = $hunterId;

        return $this;
    }

    public function getTargetId(): ?int
    {
        return $this->targetId;
    }

    public function setTargetId(int $targetId): self
    {
        $this->targetId = $targetId;

        return $this;
    }

    public function getKillerId(): ?int
    {
        return $this->killerId;
    }

    public function setKillerId(int $killerId): self
    {
        $this->killerId = $killerId;

        return $this;
    }

    public function getPrize(): ?int
    {
        return $this->prize;
    }

    public function setPrize(int $prize): self
    {
        $this->prize = $prize;

        return $this;
    }

    public function getCurrencytype(): ?string
    {
        return $this->currencytype;
    }

    public function setCurrencytype(string $currencytype): self
    {
        $this->currencytype = $currencytype;

        return $this;
    }

    public function getDateadded(): ?int
    {
        return $this->dateadded;
    }

    public function setDateadded(int $dateadded): self
    {
        $this->dateadded = $dateadded;

        return $this;
    }

    public function getKilled(): ?int
    {
        return $this->killed;
    }

    public function setKilled(int $killed): self
    {
        $this->killed = $killed;

        return $this;
    }

    public function getDatekilled(): ?int
    {
        return $this->datekilled;
    }

    public function setDatekilled(int $datekilled): self
    {
        $this->datekilled = $datekilled;

        return $this;
    }


}
