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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerId(): ?int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): self
    {
        $this->playerId = $playerId;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTimeInterface $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBidderId(): ?int
    {
        return $this->bidderId;
    }

    public function setBidderId(?int $bidderId): self
    {
        $this->bidderId = $bidderId;

        return $this;
    }

    public function getHighestBid(): ?int
    {
        return $this->highestBid;
    }

    public function setHighestBid(?int $highestBid): self
    {
        $this->highestBid = $highestBid;

        return $this;
    }


}
