<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZReferrals
 *
 * @ORM\Table(name="z_referrals")
 * @ORM\Entity
 */
class ZReferral
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
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="reward_id", type="integer", nullable=false)
     */
    private $rewardId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="bought", type="integer", nullable=false)
     */
    private $bought = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="arrived", type="integer", nullable=false)
     */
    private $arrived = '0';


}
