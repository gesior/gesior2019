<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Accounts
 *
 * @ORM\Table(name="accounts", uniqueConstraints={@ORM\UniqueConstraint(name="name_2", columns={"name"}), @ORM\UniqueConstraint(name="name", columns={"name"}), @ORM\UniqueConstraint(name="name_3", columns={"name"})})
 * @ORM\Entity
 */
class Account implements UserInterface
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
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40, nullable=false, options={"fixed"=true})
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secret", type="string", length=256, nullable=true)
     */
    private $secret;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="string", length=256, nullable=false, options={"default"="1"})
     */
    private $type = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="premdays", type="integer", nullable=false)
     */
    private $premiumDays = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="lastday", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $lastPremiumDaysUpdate = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email = '';

    /**
     * @var int
     *
     * @ORM\Column(name="vote", type="integer", nullable=false)
     */
    private $vote = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="key", type="string", length=20, nullable=true)
     */
    private $key;

    /**
     * @var string
     *
     * @ORM\Column(name="rlname", type="string", length=255, nullable=false)
     */
    private $realName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=false)
     */
    private $location = '';

    /**
     * @var int
     *
     * @ORM\Column(name="page_access", type="integer", nullable=false)
     */
    private $pageAccess = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="create_date", type="integer", nullable=false)
     */
    private $createDate = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="create_ip", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $createIp = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="flag", type="string", length=80, nullable=false)
     */
    private $flag = '';

    /**
     * @var int
     *
     * @ORM\Column(name="warnings", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $warnings = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="referrer", type="integer", nullable=false)
     */
    private $referrer = 0;

    /**
     * @var Player[]
     *
     * @ORM\OneToMany(targetEntity="Player", mappedBy="account")
     */
    private $players;

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return string[]|Role[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getName();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        $this->key = '';
    }

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

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSecret(): ?string
    {
        return $this->secret;
    }

    public function setSecret(?string $secret): self
    {
        $this->secret = $secret;

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

    public function getPremiumDays(): ?int
    {
        return $this->premiumDays;
    }

    public function setPremiumDays(int $premiumDays): self
    {
        $this->premiumDays = $premiumDays;

        return $this;
    }

    public function getLastPremiumDaysUpdate(): ?int
    {
        return $this->lastPremiumDaysUpdate;
    }

    public function setLastPremiumDaysUpdate(int $lastPremiumDaysUpdate): self
    {
        $this->lastPremiumDaysUpdate = $lastPremiumDaysUpdate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getVote(): ?int
    {
        return $this->vote;
    }

    public function setVote(int $vote): self
    {
        $this->vote = $vote;

        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getRealName(): ?string
    {
        return $this->realName;
    }

    public function setRealName(string $realName): self
    {
        $this->realName = $realName;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getPageAccess(): ?int
    {
        return $this->pageAccess;
    }

    public function setPageAccess(int $pageAccess): self
    {
        $this->pageAccess = $pageAccess;

        return $this;
    }

    public function getCreateDate(): ?int
    {
        return $this->createDate;
    }

    public function setCreateDate(int $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getCreateIp(): ?int
    {
        return $this->createIp;
    }

    public function setCreateIp(int $createIp): self
    {
        $this->createIp = $createIp;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(string $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    public function getWarnings(): ?int
    {
        return $this->warnings;
    }

    public function setWarnings(int $warnings): self
    {
        $this->warnings = $warnings;

        return $this;
    }

    public function getReferrer(): ?int
    {
        return $this->referrer;
    }

    public function setReferrer(int $referrer): self
    {
        $this->referrer = $referrer;

        return $this;
    }
}
