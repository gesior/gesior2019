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


}
