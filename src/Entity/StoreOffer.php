<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StoreOffers
 *
 * @ORM\Table(name="store_offers", indexes={@ORM\Index(name="store_offers_by_cat_name", columns={"visible", "category_id", "name"}), @ORM\Index(name="store_offers_category_id_IDX", columns={"category_id"}), @ORM\Index(name="store_offers_visible_category", columns={"visible", "category_id"})})
 * @ORM\Entity
 */
class StoreOffer
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
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="visible", type="integer", nullable=false, options={"default"="1"})
     */
    private $visible = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="deliverable", type="integer", nullable=false, options={"default"="1"})
     */
    private $deliverable = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="only_pz", type="integer", nullable=false)
     */
    private $onlyPz = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="level_min", type="integer", nullable=false)
     */
    private $levelMin = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="level_max", type="integer", nullable=false)
     */
    private $levelMax = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rook_allowed", type="integer", nullable=false)
     */
    private $rookAllowed = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=false)
     */
    private $icon;

    /**
     * @var int
     *
     * @ORM\Column(name="item", type="integer", nullable=false)
     */
    private $item = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="item_count", type="integer", nullable=false)
     */
    private $itemCount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="item_action_id", type="integer", nullable=false)
     */
    private $itemActionId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="outfit_male", type="integer", nullable=false)
     */
    private $outfitMale = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="outfit_female", type="integer", nullable=false)
     */
    private $outfitFemale = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="outfit_addon", type="integer", nullable=false)
     */
    private $outfitAddon = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="mount", type="integer", nullable=false)
     */
    private $mount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="promotion", type="integer", nullable=false)
     */
    private $promotion = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="container", type="integer", nullable=false)
     */
    private $container = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="pacc_days", type="integer", nullable=false)
     */
    private $paccDays = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="storage_values", type="text", length=65535, nullable=false)
     */
    private $storageValues;

    /**
     * @var string
     *
     * @ORM\Column(name="storage_values_required", type="text", length=65535, nullable=false)
     */
    private $storageValuesRequired;

    /**
     * @var int
     *
     * @ORM\Column(name="bless", type="integer", nullable=false)
     */
    private $bless = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="stamina_hours", type="integer", nullable=false)
     */
    private $staminaHours = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="xpboost_hours", type="integer", nullable=false)
     */
    private $xpboostHours = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="task_multiplier", type="integer", nullable=false)
     */
    private $taskMultiplier = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="task_count", type="integer", nullable=false)
     */
    private $taskCount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="prey_reroll_count", type="integer", nullable=false)
     */
    private $preyRerollCount = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exhaust_storage", type="integer", nullable=false)
     */
    private $exhaustStorage = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exhaust_max_daily", type="integer", nullable=false)
     */
    private $exhaustMaxDaily = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="exhaust_duration", type="integer", nullable=false)
     */
    private $exhaustDuration;

    /**
     * @var string
     *
     * @ORM\Column(name="price_by_uses", type="string", length=255, nullable=false)
     */
    private $priceByUses;

    /**
     * @var StoreCategory
     *
     * @ORM\ManyToOne(targetEntity="StoreCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;


}
