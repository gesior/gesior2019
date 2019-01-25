<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WarAntiIntruso
 *
 * @ORM\Table(name="war_anti_intruso", indexes={@ORM\Index(name="guild_id_win", columns={"guild_id_win"}), @ORM\Index(name="date", columns={"date"}), @ORM\Index(name="guild_id_lose", columns={"guild_id_lose"})})
 * @ORM\Entity
 */
class WarAntiIntruso
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
     * @ORM\Column(name="frag_win", type="integer", nullable=false)
     */
    private $fragWin;

    /**
     * @var int
     *
     * @ORM\Column(name="frag_lose", type="integer", nullable=false)
     */
    private $fragLose;

    /**
     * @var int
     *
     * @ORM\Column(name="frag_limit", type="integer", nullable=false)
     */
    private $fragLimit;

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $date;

    /**
     * @var Guild
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="guild_id_win", referencedColumnName="id")
     * })
     */
    private $guildWin;

    /**
     * @var Guild
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="guild_id_lose", referencedColumnName="id")
     * })
     */
    private $guildLose;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFragWin(): ?int
    {
        return $this->fragWin;
    }

    public function setFragWin(int $fragWin): self
    {
        $this->fragWin = $fragWin;

        return $this;
    }

    public function getFragLose(): ?int
    {
        return $this->fragLose;
    }

    public function setFragLose(int $fragLose): self
    {
        $this->fragLose = $fragLose;

        return $this;
    }

    public function getFragLimit(): ?int
    {
        return $this->fragLimit;
    }

    public function setFragLimit(int $fragLimit): self
    {
        $this->fragLimit = $fragLimit;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getGuildWin(): ?Guild
    {
        return $this->guildWin;
    }

    public function setGuildWin(?Guild $guildWin): self
    {
        $this->guildWin = $guildWin;

        return $this;
    }

    public function getGuildLose(): ?Guild
    {
        return $this->guildLose;
    }

    public function setGuildLose(?Guild $guildLose): self
    {
        $this->guildLose = $guildLose;

        return $this;
    }


}
