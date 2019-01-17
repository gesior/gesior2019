<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * OnlineData
 *
 * @ORM\Table(name="online_data")
 * @ORM\Entity
 */
class OnlineData
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
     * @ORM\Column(name="online", type="integer", nullable=false)
     */
    private $online = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="online_list", type="integer", nullable=false)
     */
    private $onlineList = '0';

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;


}
