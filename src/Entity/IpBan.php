<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IpBans
 *
 * @ORM\Table(name="ip_bans", indexes={@ORM\Index(name="banned_by", columns={"banned_by"})})
 * @ORM\Entity
 */
class IpBan
{
    /**
     * @var int
     *
     * @ORM\Column(name="ip", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=255, nullable=false)
     */
    private $reason;

    /**
     * @var int
     *
     * @ORM\Column(name="banned_at", type="bigint", nullable=false)
     */
    private $bannedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="expires_at", type="bigint", nullable=false)
     */
    private $expiresAt;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="banned_by", referencedColumnName="id")
     * })
     */
    private $bannedBy;


}
