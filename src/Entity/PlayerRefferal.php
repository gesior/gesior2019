<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerRefferals
 *
 * @ORM\Table(name="player_refferals")
 * @ORM\Entity
 */
class PlayerRefferal
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
    private $accountId = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="refferal_id", type="integer", nullable=true)
     */
    private $refferalId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="player_ip", type="integer", nullable=false)
     */
    private $playerIp = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date = '0';


}
