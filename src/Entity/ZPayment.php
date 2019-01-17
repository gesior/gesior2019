<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZPayments
 *
 * @ORM\Table(name="z_payments")
 * @ORM\Entity
 */
class ZPayment
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
     * @ORM\Column(name="system", type="string", length=255, nullable=false)
     */
    private $system;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_config_id", type="string", length=255, nullable=false)
     */
    private $paymentConfigId;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_data", type="text", length=65535, nullable=false)
     */
    private $paymentData;

    /**
     * @var string
     *
     * @ORM\Column(name="client_id", type="text", length=65535, nullable=false)
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_id", type="string", length=255, nullable=false)
     */
    private $transactionId;

    /**
     * @var string
     *
     * @ORM\Column(name="system_transaction_id", type="string", length=255, nullable=false)
     */
    private $systemTransactionId;

    /**
     * @var int
     *
     * @ORM\Column(name="ip", type="bigint", nullable=false)
     */
    private $ip;

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=255, nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255, nullable=false)
     */
    private $currency;

    /**
     * @var int
     *
     * @ORM\Column(name="account_id", type="integer", nullable=false)
     */
    private $accountId;

    /**
     * @var int
     *
     * @ORM\Column(name="coins", type="integer", nullable=false)
     */
    private $coins;

    /**
     * @var int
     *
     * @ORM\Column(name="add_points", type="integer", nullable=false)
     */
    private $addPoints;


}
