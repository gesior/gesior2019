<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GuildMembership
 *
 * @ORM\Table(name="guild_membership", indexes={@ORM\Index(name="rank_id", columns={"rank_id"}), @ORM\Index(name="guild_id", columns={"guild_id"})})
 * @ORM\Entity
 */
class GuildMembership
{
    /**
     * @var string
     *
     * @ORM\Column(name="nick", type="string", length=15, nullable=false)
     */
    private $nick = '';

    /**
     * @var int
     *
     * @ORM\Column(name="joined_date", type="bigint", nullable=false)
     */
    private $joinedDate = '0';

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
     * @var Guild
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="guild_id", referencedColumnName="id")
     * })
     */
    private $guild;

    /**
     * @var GuildRank
     *
     * @ORM\ManyToOne(targetEntity="GuildRank")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rank_id", referencedColumnName="id")
     * })
     */
    private $rank;


}
