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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVisible(): ?int
    {
        return $this->visible;
    }

    public function setVisible(int $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    public function getDeliverable(): ?int
    {
        return $this->deliverable;
    }

    public function setDeliverable(int $deliverable): self
    {
        $this->deliverable = $deliverable;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getOnlyPz(): ?int
    {
        return $this->onlyPz;
    }

    public function setOnlyPz(int $onlyPz): self
    {
        $this->onlyPz = $onlyPz;

        return $this;
    }

    public function getLevelMin(): ?int
    {
        return $this->levelMin;
    }

    public function setLevelMin(int $levelMin): self
    {
        $this->levelMin = $levelMin;

        return $this;
    }

    public function getLevelMax(): ?int
    {
        return $this->levelMax;
    }

    public function setLevelMax(int $levelMax): self
    {
        $this->levelMax = $levelMax;

        return $this;
    }

    public function getRookAllowed(): ?int
    {
        return $this->rookAllowed;
    }

    public function setRookAllowed(int $rookAllowed): self
    {
        $this->rookAllowed = $rookAllowed;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getItem(): ?int
    {
        return $this->item;
    }

    public function setItem(int $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getItemCount(): ?int
    {
        return $this->itemCount;
    }

    public function setItemCount(int $itemCount): self
    {
        $this->itemCount = $itemCount;

        return $this;
    }

    public function getItemActionId(): ?int
    {
        return $this->itemActionId;
    }

    public function setItemActionId(int $itemActionId): self
    {
        $this->itemActionId = $itemActionId;

        return $this;
    }

    public function getOutfitMale(): ?int
    {
        return $this->outfitMale;
    }

    public function setOutfitMale(int $outfitMale): self
    {
        $this->outfitMale = $outfitMale;

        return $this;
    }

    public function getOutfitFemale(): ?int
    {
        return $this->outfitFemale;
    }

    public function setOutfitFemale(int $outfitFemale): self
    {
        $this->outfitFemale = $outfitFemale;

        return $this;
    }

    public function getOutfitAddon(): ?int
    {
        return $this->outfitAddon;
    }

    public function setOutfitAddon(int $outfitAddon): self
    {
        $this->outfitAddon = $outfitAddon;

        return $this;
    }

    public function getMount(): ?int
    {
        return $this->mount;
    }

    public function setMount(int $mount): self
    {
        $this->mount = $mount;

        return $this;
    }

    public function getPromotion(): ?int
    {
        return $this->promotion;
    }

    public function setPromotion(int $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getContainer(): ?int
    {
        return $this->container;
    }

    public function setContainer(int $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function getPaccDays(): ?int
    {
        return $this->paccDays;
    }

    public function setPaccDays(int $paccDays): self
    {
        $this->paccDays = $paccDays;

        return $this;
    }

    public function getStorageValues(): ?string
    {
        return $this->storageValues;
    }

    public function setStorageValues(string $storageValues): self
    {
        $this->storageValues = $storageValues;

        return $this;
    }

    public function getStorageValuesRequired(): ?string
    {
        return $this->storageValuesRequired;
    }

    public function setStorageValuesRequired(string $storageValuesRequired): self
    {
        $this->storageValuesRequired = $storageValuesRequired;

        return $this;
    }

    public function getBless(): ?int
    {
        return $this->bless;
    }

    public function setBless(int $bless): self
    {
        $this->bless = $bless;

        return $this;
    }

    public function getStaminaHours(): ?int
    {
        return $this->staminaHours;
    }

    public function setStaminaHours(int $staminaHours): self
    {
        $this->staminaHours = $staminaHours;

        return $this;
    }

    public function getXpboostHours(): ?int
    {
        return $this->xpboostHours;
    }

    public function setXpboostHours(int $xpboostHours): self
    {
        $this->xpboostHours = $xpboostHours;

        return $this;
    }

    public function getTaskMultiplier(): ?int
    {
        return $this->taskMultiplier;
    }

    public function setTaskMultiplier(int $taskMultiplier): self
    {
        $this->taskMultiplier = $taskMultiplier;

        return $this;
    }

    public function getTaskCount(): ?int
    {
        return $this->taskCount;
    }

    public function setTaskCount(int $taskCount): self
    {
        $this->taskCount = $taskCount;

        return $this;
    }

    public function getPreyRerollCount(): ?int
    {
        return $this->preyRerollCount;
    }

    public function setPreyRerollCount(int $preyRerollCount): self
    {
        $this->preyRerollCount = $preyRerollCount;

        return $this;
    }

    public function getExhaustStorage(): ?int
    {
        return $this->exhaustStorage;
    }

    public function setExhaustStorage(int $exhaustStorage): self
    {
        $this->exhaustStorage = $exhaustStorage;

        return $this;
    }

    public function getExhaustMaxDaily(): ?int
    {
        return $this->exhaustMaxDaily;
    }

    public function setExhaustMaxDaily(int $exhaustMaxDaily): self
    {
        $this->exhaustMaxDaily = $exhaustMaxDaily;

        return $this;
    }

    public function getExhaustDuration(): ?int
    {
        return $this->exhaustDuration;
    }

    public function setExhaustDuration(int $exhaustDuration): self
    {
        $this->exhaustDuration = $exhaustDuration;

        return $this;
    }

    public function getPriceByUses(): ?string
    {
        return $this->priceByUses;
    }

    public function setPriceByUses(string $priceByUses): self
    {
        $this->priceByUses = $priceByUses;

        return $this;
    }

    public function getCategory(): ?StoreCategory
    {
        return $this->category;
    }

    public function setCategory(?StoreCategory $category): self
    {
        $this->category = $category;

        return $this;
    }


}
