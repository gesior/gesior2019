<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayersOnline
 *
 * @ORM\Table(name="players_online")
 * @ORM\Entity
 */
class PlayerOnline
{
    /**
     * @var int
     *
     * @ORM\Column(name="player_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $playerId;

    /**
     * @var bool
     *
     * @ORM\Column(name="broadcasting", type="boolean", nullable=false)
     */
    private $broadcasting = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40, nullable=false)
     */
    private $password = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description = '';

    /**
     * @var int
     *
     * @ORM\Column(name="spectators", type="integer", nullable=false)
     */
    private $spectators = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="protocol_version", type="integer", nullable=false)
     */
    private $protocolVersion = '0';

    public function getPlayerId(): ?int
    {
        return $this->playerId;
    }

    public function getBroadcasting(): ?bool
    {
        return $this->broadcasting;
    }

    public function setBroadcasting(bool $broadcasting): self
    {
        $this->broadcasting = $broadcasting;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSpectators(): ?int
    {
        return $this->spectators;
    }

    public function setSpectators(int $spectators): self
    {
        $this->spectators = $spectators;

        return $this;
    }

    public function getProtocolVersion(): ?int
    {
        return $this->protocolVersion;
    }

    public function setProtocolVersion(int $protocolVersion): self
    {
        $this->protocolVersion = $protocolVersion;

        return $this;
    }


}
