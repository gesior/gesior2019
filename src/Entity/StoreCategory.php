<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreCategories
 *
 * @ORM\Table(name="store_categories")
 * @ORM\Entity
 */
class StoreCategory
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
     * @ORM\Column(name="visible", type="integer", nullable=false, options={"default"="1"})
     */
    private $visible = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     */
    private $state = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=false)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;


}
