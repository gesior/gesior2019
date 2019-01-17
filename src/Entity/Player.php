<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Players
 *
 * @ORM\Table(name="players", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})}, indexes={@ORM\Index(name="account_id", columns={"account_id"}), @ORM\Index(name="vocation", columns={"vocation"})})
 * @ORM\Entity
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
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
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
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;

    /**
     * @var Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Guild", inversedBy="player")
     * @ORM\JoinTable(name="guild_invites",
     *   joinColumns={
     *     @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="guild_id", referencedColumnName="id")
     *   }
     * )
     */
    private $guild;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->guild = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
