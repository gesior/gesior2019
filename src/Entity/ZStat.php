<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZStats
 *
 * @ORM\Table(name="z_stats")
 * @ORM\Entity
 */
class ZStat
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
     * @ORM\Column(name="date_start", type="integer", nullable=false)
     */
    private $dateStart;

    /**
     * @var int
     *
     * @ORM\Column(name="date_end", type="integer", nullable=false)
     */
    private $dateEnd;

    /**
     * @var int
     *
     * @ORM\Column(name="players_min", type="integer", nullable=false)
     */
    private $playersMin;

    /**
     * @var int
     *
     * @ORM\Column(name="players_avg", type="integer", nullable=false)
     */
    private $playersAvg;

    /**
     * @var int
     *
     * @ORM\Column(name="players_max", type="integer", nullable=false)
     */
    private $playersMax;

    /**
     * @var int
     *
     * @ORM\Column(name="pay_count", type="integer", nullable=false)
     */
    private $payCount;

    /**
     * @var int
     *
     * @ORM\Column(name="pay_sum", type="integer", nullable=false)
     */
    private $paySum;

    /**
     * @var int
     *
     * @ORM\Column(name="spent_count", type="integer", nullable=false)
     */
    private $spentCount;

    /**
     * @var int
     *
     * @ORM\Column(name="spent_sum", type="integer", nullable=false)
     */
    private $spentSum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?int
    {
        return $this->dateStart;
    }

    public function setDateStart(int $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?int
    {
        return $this->dateEnd;
    }

    public function setDateEnd(int $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getPlayersMin(): ?int
    {
        return $this->playersMin;
    }

    public function setPlayersMin(int $playersMin): self
    {
        $this->playersMin = $playersMin;

        return $this;
    }

    public function getPlayersAvg(): ?int
    {
        return $this->playersAvg;
    }

    public function setPlayersAvg(int $playersAvg): self
    {
        $this->playersAvg = $playersAvg;

        return $this;
    }

    public function getPlayersMax(): ?int
    {
        return $this->playersMax;
    }

    public function setPlayersMax(int $playersMax): self
    {
        $this->playersMax = $playersMax;

        return $this;
    }

    public function getPayCount(): ?int
    {
        return $this->payCount;
    }

    public function setPayCount(int $payCount): self
    {
        $this->payCount = $payCount;

        return $this;
    }

    public function getPaySum(): ?int
    {
        return $this->paySum;
    }

    public function setPaySum(int $paySum): self
    {
        $this->paySum = $paySum;

        return $this;
    }

    public function getSpentCount(): ?int
    {
        return $this->spentCount;
    }

    public function setSpentCount(int $spentCount): self
    {
        $this->spentCount = $spentCount;

        return $this;
    }

    public function getSpentSum(): ?int
    {
        return $this->spentSum;
    }

    public function setSpentSum(int $spentSum): self
    {
        $this->spentSum = $spentSum;

        return $this;
    }


}
