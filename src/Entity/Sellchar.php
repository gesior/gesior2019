<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sellchar
 *
 * @ORM\Table(name="sellchar")
 * @ORM\Entity
 */
class Sellchar
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
     * @ORM\Column(name="name", type="string", length=40, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="vocation", type="integer", nullable=false)
     */
    private $vocation;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=40, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="oldid", type="string", length=40, nullable=false)
     */
    private $oldid;


}
