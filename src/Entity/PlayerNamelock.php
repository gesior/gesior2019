<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerNamelocks
 *
 * @ORM\Table(name="player_namelocks", indexes={@ORM\Index(name="namelocked_by", columns={"namelocked_by"})})
 * @ORM\Entity
 */
class PlayerNamelock
{
    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=255, nullable=false)
     */
    private $reason;

    /**
     * @var int
     *
     * @ORM\Column(name="namelocked_at", type="bigint", nullable=false)
     */
    private $namelockedAt;

    /**
     * @var Player
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     * })
     */
    private $player;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="namelocked_by", referencedColumnName="id")
     * })
     */
    private $namelockedBy;


}
