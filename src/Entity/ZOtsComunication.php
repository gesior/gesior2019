<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZOtsComunication
 *
 * @ORM\Table(name="z_ots_comunication")
 * @ORM\Entity
 */
class ZOtsComunication
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=false)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="param1", type="string", length=255, nullable=false)
     */
    private $param1;

    /**
     * @var string
     *
     * @ORM\Column(name="param2", type="string", length=255, nullable=false)
     */
    private $param2;

    /**
     * @var string
     *
     * @ORM\Column(name="param3", type="string", length=255, nullable=false)
     */
    private $param3;

    /**
     * @var string
     *
     * @ORM\Column(name="param4", type="string", length=255, nullable=false)
     */
    private $param4;

    /**
     * @var string
     *
     * @ORM\Column(name="param5", type="string", length=255, nullable=false)
     */
    private $param5;

    /**
     * @var string
     *
     * @ORM\Column(name="param6", type="string", length=255, nullable=false)
     */
    private $param6;

    /**
     * @var string
     *
     * @ORM\Column(name="param7", type="string", length=255, nullable=false)
     */
    private $param7;

    /**
     * @var int
     *
     * @ORM\Column(name="delete_it", type="integer", nullable=false, options={"default"="1"})
     */
    private $deleteIt = '1';


}
