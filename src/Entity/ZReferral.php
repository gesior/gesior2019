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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRewardId(): ?int
    {
        return $this->rewardId;
    }

    public function setRewardId(int $rewardId): self
    {
        $this->rewardId = $rewardId;

        return $this;
    }

    public function getBought(): ?int
    {
        return $this->bought;
    }

    public function setBought(int $bought): self
    {
        $this->bought = $bought;

        return $this;
    }

    public function getArrived(): ?int
    {
        return $this->arrived;
    }

    public function setArrived(int $arrived): self
    {
        $this->arrived = $arrived;

        return $this;
    }


}
