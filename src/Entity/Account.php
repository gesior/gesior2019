<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=256, nullable=false, options={"default"="1"})
     */
    private $type = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="premdays", type="integer", nullable=false)
     */
    private $premdays = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="coins", type="integer", nullable=false)
     */
    private $coins = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="coins_old", type="integer", nullable=false)
     */
    private $coinsOld = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lastday", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $lastday = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email = '';

    /**
     * @var int
     *
     * @ORM\Column(name="creation", type="integer", nullable=false)
     */
    private $creation = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="vote", type="integer", nullable=false)
     */
    private $vote = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="key", type="string", length=20, nullable=true)
     */
    private $key;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_new", type="string", length=255, nullable=true)
     */
    private $emailNew;

    /**
     * @var int|null
     *
     * @ORM\Column(name="email_new_time", type="integer", nullable=true)
     */
    private $emailNewTime;

    /**
     * @var string
     *
     * @ORM\Column(name="rlname", type="string", length=255, nullable=false)
     */
    private $rlname = '';

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
    private $pageAccess = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="email_code", type="string", length=255, nullable=false)
     */
    private $emailCode = '';

    /**
     * @var int
     *
     * @ORM\Column(name="next_email", type="integer", nullable=false)
     */
    private $nextEmail = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="premium_points", type="integer", nullable=false)
     */
    private $premiumPoints = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="create_date", type="integer", nullable=false)
     */
    private $createDate = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="create_ip", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $createIp = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="last_post", type="integer", nullable=false)
     */
    private $lastPost = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="flag", type="string", length=80, nullable=false)
     */
    private $flag = '';

    /**
     * @var int
     *
     * @ORM\Column(name="vip_time", type="integer", nullable=false)
     */
    private $vipTime = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="guild_points", type="integer", nullable=false)
     */
    private $guildPoints = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="loyalty", type="integer", nullable=false)
     */
    private $loyalty = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="guild_points_stats", type="integer", nullable=false)
     */
    private $guildPointsStats = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="warnings", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $warnings = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="creation_key", type="integer", nullable=true)
     */
    private $creationKey;

    /**
     * @var int
     *
     * @ORM\Column(name="key_sent", type="integer", nullable=false)
     */
    private $keySent = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="referrer", type="integer", nullable=false)
     */
    private $referrer = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="paid_out", type="integer", nullable=false)
     */
    private $paidOut = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="verify_bugs", type="integer", nullable=false)
     */
    private $verifyBugs = '0';


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
     * @return (Role|string)[] The user roles
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
        return $this->name;
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
}
