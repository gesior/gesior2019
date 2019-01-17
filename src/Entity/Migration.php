<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Migrations
 *
 * @ORM\Table(name="migrations")
 * @ORM\Entity
 */
class Migration
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="migration", type="string", length=255, nullable=false)
     */
    private $migration;

    /**
     * @var int
     *
     * @ORM\Column(name="batch", type="integer", nullable=false)
     */
    private $batch;


}
