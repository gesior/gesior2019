<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Players
 *
 * @ORM\Table(name="players", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})}, indexes={@ORM\Index(name="account_id", columns={"account_id"}), @ORM\Index(name="vocation", columns={"vocation"})})
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Player
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
     * @ORM\Column(name="group_id", type="integer", nullable=false, options={"default"="1"})
     */
    private $groupId = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer", nullable=false, options={"default"="1"})
     */
    private $level = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="xpboost_time", type="integer", nullable=true)
     */
    private $xpboostTime;

    /**
     * @var int
     *
     * @ORM\Column(name="vocation", type="integer", nullable=false)
     */
    private $vocation = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="health", type="integer", nullable=false, options={"default"="150"})
     */
    private $health = '150';

    /**
     * @var int
     *
     * @ORM\Column(name="healthmax", type="integer", nullable=false, options={"default"="150"})
     */
    private $healthmax = '150';

    /**
     * @var int
     *
     * @ORM\Column(name="experience", type="bigint", nullable=false)
     */
    private $experience = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lookbody", type="integer", nullable=false)
     */
    private $lookbody = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lookfeet", type="integer", nullable=false)
     */
    private $lookfeet = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lookhead", type="integer", nullable=false)
     */
    private $lookhead = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="looklegs", type="integer", nullable=false)
     */
    private $looklegs = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="looktype", type="integer", nullable=false, options={"default"="136"})
     */
    private $looktype = '136';

    /**
     * @var int
     *
     * @ORM\Column(name="lookaddons", type="integer", nullable=false)
     */
    private $lookaddons = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="maglevel", type="integer", nullable=false)
     */
    private $maglevel = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="mana", type="integer", nullable=false)
     */
    private $mana = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="manamax", type="integer", nullable=false)
     */
    private $manamax = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="manaspent", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $manaspent = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="soul", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $soul = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="town_id", type="integer", nullable=false)
     */
    private $townId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="posx", type="integer", nullable=false)
     */
    private $posx = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="posy", type="integer", nullable=false)
     */
    private $posy = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="posz", type="integer", nullable=false)
     */
    private $posz = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="conditions", type="blob", length=65535, nullable=false)
     */
    private $conditions;

    /**
     * @var int
     *
     * @ORM\Column(name="cap", type="integer", nullable=false)
     */
    private $cap = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="sex", type="integer", nullable=false)
     */
    private $sex = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lastlogin", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $lastlogin = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lastip", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $lastip = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="save", type="boolean", nullable=false, options={"default"="1"})
     */
    private $save = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="skull", type="boolean", nullable=false)
     */
    private $skull = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skulltime", type="integer", nullable=false)
     */
    private $skulltime = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lastlogout", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $lastlogout = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="blessings", type="boolean", nullable=false)
     */
    private $blessings = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="onlinetime", type="bigint", nullable=false)
     */
    private $onlinetime = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="deletion", type="bigint", nullable=false)
     */
    private $deletion = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="deletion_time", type="integer", nullable=false)
     */
    private $deletionTime = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="balance", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $balance = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="bonusrerollcount", type="bigint", nullable=true)
     */
    private $bonusrerollcount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="offlinetraining_time", type="smallint", nullable=false, options={"default"="43200","unsigned"=true})
     */
    private $offlinetrainingTime = '43200';

    /**
     * @var int
     *
     * @ORM\Column(name="offlinetraining_skill", type="integer", nullable=false, options={"default"="-1"})
     */
    private $offlinetrainingSkill = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="stamina", type="smallint", nullable=false, options={"default"="2520","unsigned"=true})
     */
    private $stamina = '2520';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_fist", type="integer", nullable=false, options={"default"="10","unsigned"=true})
     */
    private $skillFist = '10';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_fist_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillFistTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_club", type="integer", nullable=false, options={"default"="10","unsigned"=true})
     */
    private $skillClub = '10';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_club_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillClubTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_sword", type="integer", nullable=false, options={"default"="10","unsigned"=true})
     */
    private $skillSword = '10';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_sword_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillSwordTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_axe", type="integer", nullable=false, options={"default"="10","unsigned"=true})
     */
    private $skillAxe = '10';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_axe_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillAxeTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_dist", type="integer", nullable=false, options={"default"="10","unsigned"=true})
     */
    private $skillDist = '10';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_dist_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillDistTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_shielding", type="integer", nullable=false, options={"default"="10","unsigned"=true})
     */
    private $skillShielding = '10';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_shielding_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillShieldingTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_fishing", type="integer", nullable=false, options={"default"="10","unsigned"=true})
     */
    private $skillFishing = '10';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_fishing_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillFishingTries = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description = '';

    /**
     * @var string|null
     *
     * @Assert\Length(max=2000)
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
     *
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="create_ip", type="integer", nullable=false)
     */
    private $createIp = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="create_date", type="integer", nullable=false)
     */
    private $createDate = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="hide_char", type="integer", nullable=false)
     */
    private $hideChar = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="cast", type="boolean", nullable=false)
     */
    private $cast = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_critical_hit_chance", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $skillCriticalHitChance = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_critical_hit_chance_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillCriticalHitChanceTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_critical_hit_damage", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $skillCriticalHitDamage = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_critical_hit_damage_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillCriticalHitDamageTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_life_leech_chance", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $skillLifeLeechChance = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_life_leech_chance_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillLifeLeechChanceTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_life_leech_amount", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $skillLifeLeechAmount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_life_leech_amount_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillLifeLeechAmountTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_mana_leech_chance", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $skillManaLeechChance = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_mana_leech_chance_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillManaLeechChanceTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_mana_leech_amount", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $skillManaLeechAmount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_mana_leech_amount_tries", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillManaLeechAmountTries = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_criticalhit_chance", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillCriticalhitChance = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_criticalhit_damage", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillCriticalhitDamage = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_lifeleech_chance", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillLifeleechChance = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_lifeleech_amount", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillLifeleechAmount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_manaleech_chance", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillManaleechChance = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_manaleech_amount", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $skillManaleechAmount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="marriage_status", type="bigint", nullable=false, options={"unsigned"=true})
     */
    private $marriageStatus = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="former", type="string", length=255, nullable=true)
     */
    private $former;

    /**
     * @var int
     *
     * @ORM\Column(name="marriage_spouse", type="integer", nullable=false, options={"default"="-1"})
     */
    private $marriageSpouse = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="being_sold", type="integer", nullable=false)
     */
    private $beingSold = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="namechange", type="integer", nullable=false)
     */
    private $namechange = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="prey_column", type="smallint", nullable=false, options={"default"="1"})
     */
    private $preyColumn = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="bonus_reroll", type="integer", nullable=false)
     */
    private $bonusReroll = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="namechange_time", type="integer", nullable=false)
     */
    private $namechangeTime = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="world_id", type="integer", nullable=false)
     */
    private $worldId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="autoloot_min_value", type="integer", nullable=false)
     */
    private $autolootMinValue = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="fightmode", type="integer", nullable=true)
     */
    private $fightmode = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="chasemode", type="integer", nullable=true)
     */
    private $chasemode = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exphist_lastexp", type="bigint", nullable=false)
     */
    private $exphistLastexp = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exphist1", type="bigint", nullable=false)
     */
    private $exphist1 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exphist2", type="bigint", nullable=false)
     */
    private $exphist2 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exphist3", type="bigint", nullable=false)
     */
    private $exphist3 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exphist4", type="bigint", nullable=false)
     */
    private $exphist4 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exphist5", type="bigint", nullable=false)
     */
    private $exphist5 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exphist6", type="bigint", nullable=false)
     */
    private $exphist6 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exphist7", type="bigint", nullable=false)
     */
    private $exphist7 = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="mountain_blessings", type="boolean", nullable=false)
     */
    private $mountainBlessings;

    /**
     * @var Account
     *
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="players")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="Guild", inversedBy="playersInvited")
     * @ORM\JoinTable(name="guild_invites",
     *   joinColumns={
     *     @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="guild_id", referencedColumnName="id")
     *   }
     * )
     */
    private $guildInvites;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->guildInvites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function setGroupId(int $groupId): self
    {
        $this->groupId = $groupId;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getXpboostTime(): ?int
    {
        return $this->xpboostTime;
    }

    public function setXpboostTime(?int $xpboostTime): self
    {
        $this->xpboostTime = $xpboostTime;

        return $this;
    }

    public function getVocation(): ?int
    {
        return $this->vocation;
    }

    public function setVocation(int $vocation): self
    {
        $this->vocation = $vocation;

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;

        return $this;
    }

    public function getHealthmax(): ?int
    {
        return $this->healthmax;
    }

    public function setHealthmax(int $healthmax): self
    {
        $this->healthmax = $healthmax;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getLookbody(): ?int
    {
        return $this->lookbody;
    }

    public function setLookbody(int $lookbody): self
    {
        $this->lookbody = $lookbody;

        return $this;
    }

    public function getLookfeet(): ?int
    {
        return $this->lookfeet;
    }

    public function setLookfeet(int $lookfeet): self
    {
        $this->lookfeet = $lookfeet;

        return $this;
    }

    public function getLookhead(): ?int
    {
        return $this->lookhead;
    }

    public function setLookhead(int $lookhead): self
    {
        $this->lookhead = $lookhead;

        return $this;
    }

    public function getLooklegs(): ?int
    {
        return $this->looklegs;
    }

    public function setLooklegs(int $looklegs): self
    {
        $this->looklegs = $looklegs;

        return $this;
    }

    public function getLooktype(): ?int
    {
        return $this->looktype;
    }

    public function setLooktype(int $looktype): self
    {
        $this->looktype = $looktype;

        return $this;
    }

    public function getLookaddons(): ?int
    {
        return $this->lookaddons;
    }

    public function setLookaddons(int $lookaddons): self
    {
        $this->lookaddons = $lookaddons;

        return $this;
    }

    public function getMaglevel(): ?int
    {
        return $this->maglevel;
    }

    public function setMaglevel(int $maglevel): self
    {
        $this->maglevel = $maglevel;

        return $this;
    }

    public function getMana(): ?int
    {
        return $this->mana;
    }

    public function setMana(int $mana): self
    {
        $this->mana = $mana;

        return $this;
    }

    public function getManamax(): ?int
    {
        return $this->manamax;
    }

    public function setManamax(int $manamax): self
    {
        $this->manamax = $manamax;

        return $this;
    }

    public function getManaspent(): ?int
    {
        return $this->manaspent;
    }

    public function setManaspent(int $manaspent): self
    {
        $this->manaspent = $manaspent;

        return $this;
    }

    public function getSoul(): ?int
    {
        return $this->soul;
    }

    public function setSoul(int $soul): self
    {
        $this->soul = $soul;

        return $this;
    }

    public function getTownId(): ?int
    {
        return $this->townId;
    }

    public function setTownId(int $townId): self
    {
        $this->townId = $townId;

        return $this;
    }

    public function getPosx(): ?int
    {
        return $this->posx;
    }

    public function setPosx(int $posx): self
    {
        $this->posx = $posx;

        return $this;
    }

    public function getPosy(): ?int
    {
        return $this->posy;
    }

    public function setPosy(int $posy): self
    {
        $this->posy = $posy;

        return $this;
    }

    public function getPosz(): ?int
    {
        return $this->posz;
    }

    public function setPosz(int $posz): self
    {
        $this->posz = $posz;

        return $this;
    }

    public function getConditions()
    {
        return $this->conditions;
    }

    public function setConditions($conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getCap(): ?int
    {
        return $this->cap;
    }

    public function setCap(int $cap): self
    {
        $this->cap = $cap;

        return $this;
    }

    public function getSex(): ?int
    {
        return $this->sex;
    }

    public function setSex(int $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getLastlogin(): ?int
    {
        return $this->lastlogin;
    }

    public function setLastlogin(int $lastlogin): self
    {
        $this->lastlogin = $lastlogin;

        return $this;
    }

    public function getLastip(): ?int
    {
        return $this->lastip;
    }

    public function setLastip(int $lastip): self
    {
        $this->lastip = $lastip;

        return $this;
    }

    public function getSave(): ?bool
    {
        return $this->save;
    }

    public function setSave(bool $save): self
    {
        $this->save = $save;

        return $this;
    }

    public function getSkull(): ?bool
    {
        return $this->skull;
    }

    public function setSkull(bool $skull): self
    {
        $this->skull = $skull;

        return $this;
    }

    public function getSkulltime(): ?int
    {
        return $this->skulltime;
    }

    public function setSkulltime(int $skulltime): self
    {
        $this->skulltime = $skulltime;

        return $this;
    }

    public function getLastlogout(): ?int
    {
        return $this->lastlogout;
    }

    public function setLastlogout(int $lastlogout): self
    {
        $this->lastlogout = $lastlogout;

        return $this;
    }

    public function getBlessings(): ?bool
    {
        return $this->blessings;
    }

    public function setBlessings(bool $blessings): self
    {
        $this->blessings = $blessings;

        return $this;
    }

    public function getOnlinetime(): ?int
    {
        return $this->onlinetime;
    }

    public function setOnlinetime(int $onlinetime): self
    {
        $this->onlinetime = $onlinetime;

        return $this;
    }

    public function getDeletion(): ?int
    {
        return $this->deletion;
    }

    public function setDeletion(int $deletion): self
    {
        $this->deletion = $deletion;

        return $this;
    }

    public function getDeletionTime(): ?int
    {
        return $this->deletionTime;
    }

    public function setDeletionTime(int $deletionTime): self
    {
        $this->deletionTime = $deletionTime;

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getBonusrerollcount(): ?int
    {
        return $this->bonusrerollcount;
    }

    public function setBonusrerollcount(?int $bonusrerollcount): self
    {
        $this->bonusrerollcount = $bonusrerollcount;

        return $this;
    }

    public function getOfflinetrainingTime(): ?int
    {
        return $this->offlinetrainingTime;
    }

    public function setOfflinetrainingTime(int $offlinetrainingTime): self
    {
        $this->offlinetrainingTime = $offlinetrainingTime;

        return $this;
    }

    public function getOfflinetrainingSkill(): ?int
    {
        return $this->offlinetrainingSkill;
    }

    public function setOfflinetrainingSkill(int $offlinetrainingSkill): self
    {
        $this->offlinetrainingSkill = $offlinetrainingSkill;

        return $this;
    }

    public function getStamina(): ?int
    {
        return $this->stamina;
    }

    public function setStamina(int $stamina): self
    {
        $this->stamina = $stamina;

        return $this;
    }

    public function getSkillFist(): ?int
    {
        return $this->skillFist;
    }

    public function setSkillFist(int $skillFist): self
    {
        $this->skillFist = $skillFist;

        return $this;
    }

    public function getSkillFistTries(): ?int
    {
        return $this->skillFistTries;
    }

    public function setSkillFistTries(int $skillFistTries): self
    {
        $this->skillFistTries = $skillFistTries;

        return $this;
    }

    public function getSkillClub(): ?int
    {
        return $this->skillClub;
    }

    public function setSkillClub(int $skillClub): self
    {
        $this->skillClub = $skillClub;

        return $this;
    }

    public function getSkillClubTries(): ?int
    {
        return $this->skillClubTries;
    }

    public function setSkillClubTries(int $skillClubTries): self
    {
        $this->skillClubTries = $skillClubTries;

        return $this;
    }

    public function getSkillSword(): ?int
    {
        return $this->skillSword;
    }

    public function setSkillSword(int $skillSword): self
    {
        $this->skillSword = $skillSword;

        return $this;
    }

    public function getSkillSwordTries(): ?int
    {
        return $this->skillSwordTries;
    }

    public function setSkillSwordTries(int $skillSwordTries): self
    {
        $this->skillSwordTries = $skillSwordTries;

        return $this;
    }

    public function getSkillAxe(): ?int
    {
        return $this->skillAxe;
    }

    public function setSkillAxe(int $skillAxe): self
    {
        $this->skillAxe = $skillAxe;

        return $this;
    }

    public function getSkillAxeTries(): ?int
    {
        return $this->skillAxeTries;
    }

    public function setSkillAxeTries(int $skillAxeTries): self
    {
        $this->skillAxeTries = $skillAxeTries;

        return $this;
    }

    public function getSkillDist(): ?int
    {
        return $this->skillDist;
    }

    public function setSkillDist(int $skillDist): self
    {
        $this->skillDist = $skillDist;

        return $this;
    }

    public function getSkillDistTries(): ?int
    {
        return $this->skillDistTries;
    }

    public function setSkillDistTries(int $skillDistTries): self
    {
        $this->skillDistTries = $skillDistTries;

        return $this;
    }

    public function getSkillShielding(): ?int
    {
        return $this->skillShielding;
    }

    public function setSkillShielding(int $skillShielding): self
    {
        $this->skillShielding = $skillShielding;

        return $this;
    }

    public function getSkillShieldingTries(): ?int
    {
        return $this->skillShieldingTries;
    }

    public function setSkillShieldingTries(int $skillShieldingTries): self
    {
        $this->skillShieldingTries = $skillShieldingTries;

        return $this;
    }

    public function getSkillFishing(): ?int
    {
        return $this->skillFishing;
    }

    public function setSkillFishing(int $skillFishing): self
    {
        $this->skillFishing = $skillFishing;

        return $this;
    }

    public function getSkillFishingTries(): ?int
    {
        return $this->skillFishingTries;
    }

    public function setSkillFishingTries(int $skillFishingTries): self
    {
        $this->skillFishingTries = $skillFishingTries;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

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

    public function getCreateDate(): ?int
    {
        return $this->createDate;
    }

    public function setCreateDate(int $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getHideChar(): ?int
    {
        return $this->hideChar;
    }

    public function setHideChar(int $hideChar): self
    {
        $this->hideChar = $hideChar;

        return $this;
    }

    public function getCast(): ?bool
    {
        return $this->cast;
    }

    public function setCast(bool $cast): self
    {
        $this->cast = $cast;

        return $this;
    }

    public function getSkillCriticalHitChance(): ?int
    {
        return $this->skillCriticalHitChance;
    }

    public function setSkillCriticalHitChance(int $skillCriticalHitChance): self
    {
        $this->skillCriticalHitChance = $skillCriticalHitChance;

        return $this;
    }

    public function getSkillCriticalHitChanceTries(): ?int
    {
        return $this->skillCriticalHitChanceTries;
    }

    public function setSkillCriticalHitChanceTries(int $skillCriticalHitChanceTries): self
    {
        $this->skillCriticalHitChanceTries = $skillCriticalHitChanceTries;

        return $this;
    }

    public function getSkillCriticalHitDamage(): ?int
    {
        return $this->skillCriticalHitDamage;
    }

    public function setSkillCriticalHitDamage(int $skillCriticalHitDamage): self
    {
        $this->skillCriticalHitDamage = $skillCriticalHitDamage;

        return $this;
    }

    public function getSkillCriticalHitDamageTries(): ?int
    {
        return $this->skillCriticalHitDamageTries;
    }

    public function setSkillCriticalHitDamageTries(int $skillCriticalHitDamageTries): self
    {
        $this->skillCriticalHitDamageTries = $skillCriticalHitDamageTries;

        return $this;
    }

    public function getSkillLifeLeechChance(): ?int
    {
        return $this->skillLifeLeechChance;
    }

    public function setSkillLifeLeechChance(int $skillLifeLeechChance): self
    {
        $this->skillLifeLeechChance = $skillLifeLeechChance;

        return $this;
    }

    public function getSkillLifeLeechChanceTries(): ?int
    {
        return $this->skillLifeLeechChanceTries;
    }

    public function setSkillLifeLeechChanceTries(int $skillLifeLeechChanceTries): self
    {
        $this->skillLifeLeechChanceTries = $skillLifeLeechChanceTries;

        return $this;
    }

    public function getSkillLifeLeechAmount(): ?int
    {
        return $this->skillLifeLeechAmount;
    }

    public function setSkillLifeLeechAmount(int $skillLifeLeechAmount): self
    {
        $this->skillLifeLeechAmount = $skillLifeLeechAmount;

        return $this;
    }

    public function getSkillLifeLeechAmountTries(): ?int
    {
        return $this->skillLifeLeechAmountTries;
    }

    public function setSkillLifeLeechAmountTries(int $skillLifeLeechAmountTries): self
    {
        $this->skillLifeLeechAmountTries = $skillLifeLeechAmountTries;

        return $this;
    }

    public function getSkillManaLeechChance(): ?int
    {
        return $this->skillManaLeechChance;
    }

    public function setSkillManaLeechChance(int $skillManaLeechChance): self
    {
        $this->skillManaLeechChance = $skillManaLeechChance;

        return $this;
    }

    public function getSkillManaLeechChanceTries(): ?int
    {
        return $this->skillManaLeechChanceTries;
    }

    public function setSkillManaLeechChanceTries(int $skillManaLeechChanceTries): self
    {
        $this->skillManaLeechChanceTries = $skillManaLeechChanceTries;

        return $this;
    }

    public function getSkillManaLeechAmount(): ?int
    {
        return $this->skillManaLeechAmount;
    }

    public function setSkillManaLeechAmount(int $skillManaLeechAmount): self
    {
        $this->skillManaLeechAmount = $skillManaLeechAmount;

        return $this;
    }

    public function getSkillManaLeechAmountTries(): ?int
    {
        return $this->skillManaLeechAmountTries;
    }

    public function setSkillManaLeechAmountTries(int $skillManaLeechAmountTries): self
    {
        $this->skillManaLeechAmountTries = $skillManaLeechAmountTries;

        return $this;
    }

    public function getMarriageStatus(): ?int
    {
        return $this->marriageStatus;
    }

    public function setMarriageStatus(int $marriageStatus): self
    {
        $this->marriageStatus = $marriageStatus;

        return $this;
    }

    public function getFormer(): ?string
    {
        return $this->former;
    }

    public function setFormer(?string $former): self
    {
        $this->former = $former;

        return $this;
    }

    public function getMarriageSpouse(): ?int
    {
        return $this->marriageSpouse;
    }

    public function setMarriageSpouse(int $marriageSpouse): self
    {
        $this->marriageSpouse = $marriageSpouse;

        return $this;
    }

    public function getBeingSold(): ?int
    {
        return $this->beingSold;
    }

    public function setBeingSold(int $beingSold): self
    {
        $this->beingSold = $beingSold;

        return $this;
    }

    public function getNamechange(): ?int
    {
        return $this->namechange;
    }

    public function setNamechange(int $namechange): self
    {
        $this->namechange = $namechange;

        return $this;
    }

    public function getPreyColumn(): ?int
    {
        return $this->preyColumn;
    }

    public function setPreyColumn(int $preyColumn): self
    {
        $this->preyColumn = $preyColumn;

        return $this;
    }

    public function getBonusReroll(): ?int
    {
        return $this->bonusReroll;
    }

    public function setBonusReroll(int $bonusReroll): self
    {
        $this->bonusReroll = $bonusReroll;

        return $this;
    }

    public function getNamechangeTime(): ?int
    {
        return $this->namechangeTime;
    }

    public function setNamechangeTime(int $namechangeTime): self
    {
        $this->namechangeTime = $namechangeTime;

        return $this;
    }

    public function getWorldId(): ?int
    {
        return $this->worldId;
    }

    public function setWorldId(int $worldId): self
    {
        $this->worldId = $worldId;

        return $this;
    }

    public function getAutolootMinValue(): ?int
    {
        return $this->autolootMinValue;
    }

    public function setAutolootMinValue(int $autolootMinValue): self
    {
        $this->autolootMinValue = $autolootMinValue;

        return $this;
    }

    public function getFightmode(): ?int
    {
        return $this->fightmode;
    }

    public function setFightmode(?int $fightmode): self
    {
        $this->fightmode = $fightmode;

        return $this;
    }

    public function getChasemode(): ?int
    {
        return $this->chasemode;
    }

    public function setChasemode(?int $chasemode): self
    {
        $this->chasemode = $chasemode;

        return $this;
    }

    public function getExphistLastexp(): ?int
    {
        return $this->exphistLastexp;
    }

    public function setExphistLastexp(int $exphistLastexp): self
    {
        $this->exphistLastexp = $exphistLastexp;

        return $this;
    }

    public function getExphist1(): ?int
    {
        return $this->exphist1;
    }

    public function setExphist1(int $exphist1): self
    {
        $this->exphist1 = $exphist1;

        return $this;
    }

    public function getExphist2(): ?int
    {
        return $this->exphist2;
    }

    public function setExphist2(int $exphist2): self
    {
        $this->exphist2 = $exphist2;

        return $this;
    }

    public function getExphist3(): ?int
    {
        return $this->exphist3;
    }

    public function setExphist3(int $exphist3): self
    {
        $this->exphist3 = $exphist3;

        return $this;
    }

    public function getExphist4(): ?int
    {
        return $this->exphist4;
    }

    public function setExphist4(int $exphist4): self
    {
        $this->exphist4 = $exphist4;

        return $this;
    }

    public function getExphist5(): ?int
    {
        return $this->exphist5;
    }

    public function setExphist5(int $exphist5): self
    {
        $this->exphist5 = $exphist5;

        return $this;
    }

    public function getExphist6(): ?int
    {
        return $this->exphist6;
    }

    public function setExphist6(int $exphist6): self
    {
        $this->exphist6 = $exphist6;

        return $this;
    }

    public function getExphist7(): ?int
    {
        return $this->exphist7;
    }

    public function setExphist7(int $exphist7): self
    {
        $this->exphist7 = $exphist7;

        return $this;
    }

    public function getMountainBlessings(): ?bool
    {
        return $this->mountainBlessings;
    }

    public function setMountainBlessings(bool $mountainBlessings): self
    {
        $this->mountainBlessings = $mountainBlessings;

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

    /**
     * @return Collection|Guild[]
     */
    public function getGuildInvites(): Collection
    {
        return $this->guildInvites;
    }

    public function addGuildInvites(Guild $guild): self
    {
        if (!$this->guildInvites->contains($guild)) {
            $this->guildInvites[] = $guild;
        }

        return $this;
    }

    public function removeGuildInvites(Guild $guild): self
    {
        if ($this->guildInvites->contains($guild)) {
            $this->guildInvites->removeElement($guild);
        }

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreateDate(time());
    }
}
