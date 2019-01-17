<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Charauctions
 *
 * @ORM\Table(name="charauctions", uniqueConstraints={@ORM\UniqueConstraint(name="player_id", columns={"player_id"})})
 * @ORM\Entity
 */
class Charauctions
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
     * @ORM\Column(name="player_id", type="integer", nullable=false)
     */
    private $playerId;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_time", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateTime = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bidder_id", type="integer", nullable=true)
     */
    private $bidderId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="highest_bid", type="integer", nullable=true)
     */
    private $highestBid;


}
