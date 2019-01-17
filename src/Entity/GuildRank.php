<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GuildRanks
 *
 * @ORM\Table(name="guild_ranks", indexes={@ORM\Index(name="guild_id", columns={"guild_id"})})
 * @ORM\Entity
 */
class GuildRank
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false, options={"comment"="rank name"})
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer", nullable=false, options={"comment"="rank level - leader, vice, member, maybe something else"})
     */
    private $level;

    /**
     * @var Guild
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="guild_id", referencedColumnName="id")
     * })
     */
    private $guild;


}
