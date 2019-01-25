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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getVocation(): ?int
    {
        return $this->vocation;
    }

    public function setVocation(int $vocation): self
    {
        $this->vocation = $vocation;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getOldid(): ?string
    {
        return $this->oldid;
    }

    public function setOldid(string $oldid): self
    {
        $this->oldid = $oldid;

        return $this;
    }


}
