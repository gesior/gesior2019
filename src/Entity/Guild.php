<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreationdata(): ?int
    {
        return $this->creationdata;
    }

    public function setCreationdata(int $creationdata): self
    {
        $this->creationdata = $creationdata;

        return $this;
    }

    public function getMotd(): ?string
    {
        return $this->motd;
    }

    public function setMotd(string $motd): self
    {
        $this->motd = $motd;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGuildLogo()
    {
        return $this->guildLogo;
    }

    public function setGuildLogo($guildLogo): self
    {
        $this->guildLogo = $guildLogo;

        return $this;
    }

    public function getCreateIp(): ?int
    {
        return $this->createIp;
    }

    public function setCreateIp(int $createIp): self
    {
        $this->createIp = $createIp;

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getLastExecutePoints(): ?int
    {
        return $this->lastExecutePoints;
    }

    public function setLastExecutePoints(int $lastExecutePoints): self
    {
        $this->lastExecutePoints = $lastExecutePoints;

        return $this;
    }

    public function getLogoGfxName(): ?string
    {
        return $this->logoGfxName;
    }

    public function setLogoGfxName(string $logoGfxName): self
    {
        $this->logoGfxName = $logoGfxName;

        return $this;
    }

    public function getOwnerid(): ?Player
    {
        return $this->ownerid;
    }

    public function setOwnerid(?Player $ownerid): self
    {
        $this->ownerid = $ownerid;

        return $this;
    }

    /**
     * @return Collection|Player[]
     */
    public function getPlayer(): Collection
    {
        return $this->player;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->player->contains($player)) {
            $this->player[] = $player;
            $player->addGuild($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->player->contains($player)) {
            $this->player->removeElement($player);
            $player->removeGuild($this);
        }

        return $this;
    }

}
