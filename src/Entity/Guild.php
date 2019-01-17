<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guilds
 *
 * @ORM\Table(name="guilds", uniqueConstraints={@ORM\UniqueConstraint(name="ownerid", columns={"ownerid"}), @ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 */
class Guild
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="creationdata", type="integer", nullable=false)
     */
    private $creationdata;

    /**
     * @var string
     *
     * @ORM\Column(name="motd", type="string", length=255, nullable=false)
     */
    private $motd = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="guild_logo", type="blob", length=16777215, nullable=true)
     */
    private $guildLogo;

    /**
     * @var int
     *
     * @ORM\Column(name="create_ip", type="integer", nullable=false)
     */
    private $createIp = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="balance", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $balance = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="last_execute_points", type="integer", nullable=false)
     */
    private $lastExecutePoints = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="logo_gfx_name", type="string", length=255, nullable=false)
     */
    private $logoGfxName = '';

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ownerid", referencedColumnName="id")
     * })
     */
    private $ownerid;

    /**
     * @var Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Player", mappedBy="guild")
     */
    private $player;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->player = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
