<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreHistory
 *
 * @ORM\Table(name="store_history", indexes={@ORM\Index(name="store_history_account_timestamp", columns={"account_id", "timestamp"}), @ORM\Index(name="account_id", columns={"account_id"})})
 * @ORM\Entity
 */
class StoreHistory
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
     * @ORM\Column(name="mode", type="integer", nullable=false)
     */
    private $mode = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="coins", type="integer", nullable=false)
     */
    private $coins = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=3500, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="timestamp", type="integer", nullable=false)
     */
    private $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="system", type="string", length=255, nullable=false, options={"default"="OLD"})
     */
    private $system = 'OLD';

    /**
     * @var int
     *
     * @ORM\Column(name="transaction_id", type="integer", nullable=false)
     */
    private $transactionId = '0';

    /**
     * @var Account
     *
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;


}
