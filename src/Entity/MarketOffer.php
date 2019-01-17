<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MarketOffers
 *
 * @ORM\Table(name="market_offers", indexes={@ORM\Index(name="player_id", columns={"player_id"}), @ORM\Index(name="sale", columns={"sale", "itemtype"}), @ORM\Index(name="created", columns={"created"})})
 * @ORM\Entity
 */
class MarketOffer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="sale", type="boolean", nullable=false)
     */
    private $sale = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="itemtype", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $itemtype;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $amount;

    /**
     * @var int
     *
     * @ORM\Column(name="created", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $created;

    /**
     * @var bool
     *
     * @ORM\Column(name="anonymous", type="boolean", nullable=false)
     */
    private $anonymous = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $price = '0';

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     * })
     */
    private $player;


}
