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


}
