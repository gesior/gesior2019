<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GuildwarKills
 *
 * @ORM\Table(name="guildwar_kills", indexes={@ORM\Index(name="warid", columns={"warid"})})
 * @ORM\Entity
 */
class GuildwarKill
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
     * @ORM\Column(name="killer", type="string", length=50, nullable=false)
     */
    private $killer;

    /**
     * @var string
     *
     * @ORM\Column(name="target", type="string", length=50, nullable=false)
     */
    private $target;

    /**
     * @var int
     *
     * @ORM\Column(name="killerguild", type="integer", nullable=false)
     */
    private $killerguild = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="targetguild", type="integer", nullable=false)
     */
    private $targetguild = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="time", type="bigint", nullable=false)
     */
    private $time;

    /**
     * @var GuildWar
     *
     * @ORM\ManyToOne(targetEntity="GuildWar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="warid", referencedColumnName="id")
     * })
     */
    private $warid;


}
