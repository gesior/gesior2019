<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Houses
 *
 * @ORM\Table(name="houses", indexes={@ORM\Index(name="town_id", columns={"town_id"}), @ORM\Index(name="owner", columns={"owner"})})
 * @ORM\Entity
 */
class House
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
     * @ORM\Column(name="owner", type="integer", nullable=false)
     */
    private $owner;

    /**
     * @var int
     *
     * @ORM\Column(name="paid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $paid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="warnings", type="integer", nullable=false)
     */
    private $warnings = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="rent", type="integer", nullable=false)
     */
    private $rent = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="town_id", type="integer", nullable=false)
     */
    private $townId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="bid", type="integer", nullable=false)
     */
    private $bid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="bid_end", type="integer", nullable=false)
     */
    private $bidEnd = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="last_bid", type="integer", nullable=false)
     */
    private $lastBid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="highest_bidder", type="integer", nullable=false)
     */
    private $highestBidder = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="beds", type="integer", nullable=false)
     */
    private $beds = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="being_sold", type="integer", nullable=false)
     */
    private $beingSold = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="accepted", type="integer", nullable=false)
     */
    private $accepted = '0';
}
