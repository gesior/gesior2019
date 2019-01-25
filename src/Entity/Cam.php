<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cams
 *
 * @ORM\Table(name="cams", indexes={@ORM\Index(name="cams_account_id_IDX", columns={"account_id"}), @ORM\Index(name="cams_player_id_IDX", columns={"player_id"}), @ORM\Index(name="cams_public_IDX", columns={"public"})})
 * @ORM\Entity
 */
class Cam
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
     * @var int
     *
     * @ORM\Column(name="player_id", type="integer", nullable=false)
     */
    private $playerId;

    /**
     * @var int
     *
     * @ORM\Column(name="account_id", type="integer", nullable=false)
     */
    private $accountId;

    /**
     * @var int
     *
     * @ORM\Column(name="player_level", type="integer", nullable=false)
     */
    private $playerLevel = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="player_ip", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $playerIp = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="date_start", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $dateStart = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="date_end", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $dateEnd = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="offset_start", type="integer", nullable=false)
     */
    private $offsetStart = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="offset_end", type="integer", nullable=false)
     */
    private $offsetEnd = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $size = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

    /**
     * @var bool
     *
     * @ORM\Column(name="public", type="boolean", nullable=false)
     */
    private $public = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayerId(): ?int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): self
    {
        $this->playerId = $playerId;

        return $this;
    }

    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    public function setAccountId(int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getPlayerLevel(): ?int
    {
        return $this->playerLevel;
    }

    public function setPlayerLevel(int $playerLevel): self
    {
        $this->playerLevel = $playerLevel;

        return $this;
    }

    public function getPlayerIp(): ?int
    {
        return $this->playerIp;
    }

    public function setPlayerIp(int $playerIp): self
    {
        $this->playerIp = $playerIp;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDateStart(): ?int
    {
        return $this->dateStart;
    }

    public function setDateStart(int $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?int
    {
        return $this->dateEnd;
    }

    public function setDateEnd(int $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getOffsetStart(): ?int
    {
        return $this->offsetStart;
    }

    public function setOffsetStart(int $offsetStart): self
    {
        $this->offsetStart = $offsetStart;

        return $this;
    }

    public function getOffsetEnd(): ?int
    {
        return $this->offsetEnd;
    }

    public function setOffsetEnd(int $offsetEnd): self
    {
        $this->offsetEnd = $offsetEnd;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): self
    {
        $this->public = $public;

        return $this;
    }


}
