<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccountBans
 *
 * @ORM\Table(name="account_bans", indexes={@ORM\Index(name="account_bans_banned_id_FK", columns={"banned_id"}), @ORM\Index(name="banned_by", columns={"banned_by"})})
 * @ORM\Entity
 */
class AccountBan
{
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
     *   @ORM\JoinColumn(name="banned_id", referencedColumnName="id")
     * })
     */
    private $banned;

    /**
     * @var Account
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;

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
