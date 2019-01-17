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


}
