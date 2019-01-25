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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSystem(): ?string
    {
        return $this->system;
    }

    public function setSystem(string $system): self
    {
        $this->system = $system;

        return $this;
    }

    public function getPaymentConfigId(): ?string
    {
        return $this->paymentConfigId;
    }

    public function setPaymentConfigId(string $paymentConfigId): self
    {
        $this->paymentConfigId = $paymentConfigId;

        return $this;
    }

    public function getPaymentData(): ?string
    {
        return $this->paymentData;
    }

    public function setPaymentData(string $paymentData): self
    {
        $this->paymentData = $paymentData;

        return $this;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function setClientId(string $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(string $transactionId): self
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getSystemTransactionId(): ?string
    {
        return $this->systemTransactionId;
    }

    public function setSystemTransactionId(string $systemTransactionId): self
    {
        $this->systemTransactionId = $systemTransactionId;

        return $this;
    }

    public function getIp(): ?int
    {
        return $this->ip;
    }

    public function setIp(int $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(int $date): self
    {
        $this->date = $date;

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

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    public function setAccountId(int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getCoins(): ?int
    {
        return $this->coins;
    }

    public function setCoins(int $coins): self
    {
        $this->coins = $coins;

        return $this;
    }

    public function getAddPoints(): ?int
    {
        return $this->addPoints;
    }

    public function setAddPoints(int $addPoints): self
    {
        $this->addPoints = $addPoints;

        return $this;
    }


}
