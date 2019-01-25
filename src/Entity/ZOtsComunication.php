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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getParam1(): ?string
    {
        return $this->param1;
    }

    public function setParam1(string $param1): self
    {
        $this->param1 = $param1;

        return $this;
    }

    public function getParam2(): ?string
    {
        return $this->param2;
    }

    public function setParam2(string $param2): self
    {
        $this->param2 = $param2;

        return $this;
    }

    public function getParam3(): ?string
    {
        return $this->param3;
    }

    public function setParam3(string $param3): self
    {
        $this->param3 = $param3;

        return $this;
    }

    public function getParam4(): ?string
    {
        return $this->param4;
    }

    public function setParam4(string $param4): self
    {
        $this->param4 = $param4;

        return $this;
    }

    public function getParam5(): ?string
    {
        return $this->param5;
    }

    public function setParam5(string $param5): self
    {
        $this->param5 = $param5;

        return $this;
    }

    public function getParam6(): ?string
    {
        return $this->param6;
    }

    public function setParam6(string $param6): self
    {
        $this->param6 = $param6;

        return $this;
    }

    public function getParam7(): ?string
    {
        return $this->param7;
    }

    public function setParam7(string $param7): self
    {
        $this->param7 = $param7;

        return $this;
    }

    public function getDeleteIt(): ?int
    {
        return $this->deleteIt;
    }

    public function setDeleteIt(int $deleteIt): self
    {
        $this->deleteIt = $deleteIt;

        return $this;
    }


}
