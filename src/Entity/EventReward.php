<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventRewards
 *
 * @ORM\Table(name="event_rewards", indexes={@ORM\Index(name="account_id", columns={"account_id"})})
 * @ORM\Entity
 */
class EventReward
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
     * @var int|null
     *
     * @ORM\Column(name="account_id", type="integer", nullable=true)
     */
    private $accountId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codigo", type="string", length=32, nullable=true)
     */
    private $codigo;

    /**
     * @var int
     *
     * @ORM\Column(name="opcion", type="integer", nullable=false)
     */
    private $opcion;

    /**
     * @var int
     *
     * @ORM\Column(name="tiempo_creado", type="integer", nullable=false)
     */
    private $tiempoCreado;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tiempo_usado", type="integer", nullable=true)
     */
    private $tiempoUsado;

    /**
     * @var int
     *
     * @ORM\Column(name="usado", type="integer", nullable=false)
     */
    private $usado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    public function setAccountId(?int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getOpcion(): ?int
    {
        return $this->opcion;
    }

    public function setOpcion(int $opcion): self
    {
        $this->opcion = $opcion;

        return $this;
    }

    public function getTiempoCreado(): ?int
    {
        return $this->tiempoCreado;
    }

    public function setTiempoCreado(int $tiempoCreado): self
    {
        $this->tiempoCreado = $tiempoCreado;

        return $this;
    }

    public function getTiempoUsado(): ?int
    {
        return $this->tiempoUsado;
    }

    public function setTiempoUsado(?int $tiempoUsado): self
    {
        $this->tiempoUsado = $tiempoUsado;

        return $this;
    }

    public function getUsado(): ?int
    {
        return $this->usado;
    }

    public function setUsado(int $usado): self
    {
        $this->usado = $usado;

        return $this;
    }


}
