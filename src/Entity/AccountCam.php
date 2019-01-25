<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountCams
 *
 * @ORM\Table(name="account_cams", indexes={@ORM\Index(name="account_cams_account_id_status_IDX", columns={"account_id", "visibility_type"}), @ORM\Index(name="account_cams_cam_id_IDX", columns={"cam_id"}), @ORM\Index(name="account_cams_account_id_IDX", columns={"account_id"})})
 * @ORM\Entity
 */
class AccountCam
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
     * @var bool
     *
     * @ORM\Column(name="visibility_type", type="boolean", nullable=false, options={"default"="1"})
     */
    private $visibilityType = '1';

    /**
     * @var Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;

    /**
     * @var Cam
     *
     * @ORM\ManyToOne(targetEntity="Cam")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cam_id", referencedColumnName="id")
     * })
     */
    private $cam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisibilityType(): ?bool
    {
        return $this->visibilityType;
    }

    public function setVisibilityType(bool $visibilityType): self
    {
        $this->visibilityType = $visibilityType;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getCam(): ?Cam
    {
        return $this->cam;
    }

    public function setCam(?Cam $cam): self
    {
        $this->cam = $cam;

        return $this;
    }


}
