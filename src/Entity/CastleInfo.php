<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CastleInfo
 *
 * @ORM\Table(name="castle_info", indexes={@ORM\Index(name="guild_id", columns={"guild_id"})})
 * @ORM\Entity
 */
class CastleInfo
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
     * @ORM\Column(name="guild_name", type="string", length=32, nullable=false)
     */
    private $guildName;

    /**
     * @var int
     *
     * @ORM\Column(name="timestamp", type="bigint", nullable=false)
     */
    private $timestamp;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '0';

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
