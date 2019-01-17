<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerStorage
 *
 * @ORM\Table(name="player_storage", indexes={@ORM\Index(name="IDX_358EE47199E6F5DF", columns={"player_id"})})
 * @ORM\Entity
 */
class PlayerStorage
{
    /**
     * @var int
     *
     * @ORM\Column(name="key", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $key = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value = '0';

    /**
     * @var Player
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     * })
     */
    private $player;


}
