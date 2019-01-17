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


}
