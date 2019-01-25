<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerAutoloot
 *
 * @ORM\Table(name="player_autoloot", indexes={@ORM\Index(name="player_id", columns={"player_id"})})
 * @ORM\Entity
 */
class PlayerAutoloot
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
     * @var string|null
     *
     * @ORM\Column(name="autoloot_list", type="blob", length=65535, nullable=true)
     */
    private $autolootList;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     * })
     */
    private $player;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAutolootList()
    {
        return $this->autolootList;
    }

    public function setAutolootList($autolootList): self
    {
        $this->autolootList = $autolootList;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): self
    {
        $this->player = $player;

        return $this;
    }


}
