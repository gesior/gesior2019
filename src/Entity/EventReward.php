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


}
