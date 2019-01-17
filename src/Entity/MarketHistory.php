<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MarketHistory
 *
 * @ORM\Table(name="market_history", indexes={@ORM\Index(name="player_id", columns={"player_id", "sale"}), @ORM\Index(name="IDX_2E2C98CB99E6F5DF", columns={"player_id"})})
 * @ORM\Entity
 */
class MarketHistory
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
     * @var int
     *
     * @ORM\Column(name="offer_id", type="integer", nullable=false)
     */
    private $offerId = '0';

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
     * @ORM\Column(name="price", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $price = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="expires_at", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $expiresAt;

    /**
     * @var int
     *
     * @ORM\Column(name="inserted", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $inserted;

    /**
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=false)
     */
    private $state;

    /**
     * @var int
     *
     * @ORM\Column(name="from_world", type="integer", nullable=false)
     */
    private $fromWorld;

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
