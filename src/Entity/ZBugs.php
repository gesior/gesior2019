<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * ZBugs
 *
 * @ORM\Table(name="z_bugs")
 * @ORM\Entity
 */
class ZBugs
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
     * @ORM\Column(name="posx", type="integer", nullable=false)
     */
    private $posx;

    /**
     * @var int
     *
     * @ORM\Column(name="posy", type="integer", nullable=false)
     */
    private $posy;

    /**
     * @var int
     *
     * @ORM\Column(name="posz", type="integer", nullable=false)
     */
    private $posz;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="player_id", type="integer", nullable=false)
     */
    private $playerId;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     */
    private $state;


}
