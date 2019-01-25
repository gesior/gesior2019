<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZForum
 *
 * @ORM\Table(name="z_forum", indexes={@ORM\Index(name="section", columns={"section"})})
 * @ORM\Entity
 */
class ZForum
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
     * @ORM\Column(name="first_post", type="integer", nullable=false)
     */
    private $firstPost = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="last_post", type="integer", nullable=false)
     */
    private $lastPost = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="section", type="integer", nullable=false)
     */
    private $section = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="replies", type="integer", nullable=false)
     */
    private $replies = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="author_aid", type="integer", nullable=false)
     */
    private $authorAid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="author_guid", type="integer", nullable=false)
     */
    private $authorGuid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="post_text", type="text", length=65535, nullable=false)
     */
    private $postText;

    /**
     * @var string
     *
     * @ORM\Column(name="post_topic", type="string", length=350, nullable=false)
     */
    private $postTopic;

    /**
     * @var bool
     *
     * @ORM\Column(name="post_smile", type="boolean", nullable=false)
     */
    private $postSmile = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="post_date", type="integer", nullable=false)
     */
    private $postDate = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="last_edit_aid", type="integer", nullable=false)
     */
    private $lastEditAid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="edit_date", type="integer", nullable=false)
     */
    private $editDate = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="post_ip", type="string", length=15, nullable=false, options={"default"="0.0.0.0"})
     */
    private $postIp = '0.0.0.0';

    /**
     * @var int
     *
     * @ORM\Column(name="icon_id", type="integer", nullable=false)
     */
    private $iconId = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstPost(): ?int
    {
        return $this->firstPost;
    }

    public function setFirstPost(int $firstPost): self
    {
        $this->firstPost = $firstPost;

        return $this;
    }

    public function getLastPost(): ?int
    {
        return $this->lastPost;
    }

    public function setLastPost(int $lastPost): self
    {
        $this->lastPost = $lastPost;

        return $this;
    }

    public function getSection(): ?int
    {
        return $this->section;
    }

    public function setSection(int $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getReplies(): ?int
    {
        return $this->replies;
    }

    public function setReplies(int $replies): self
    {
        $this->replies = $replies;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): self
    {
        $this->views = $views;

        return $this;
    }

    public function getAuthorAid(): ?int
    {
        return $this->authorAid;
    }

    public function setAuthorAid(int $authorAid): self
    {
        $this->authorAid = $authorAid;

        return $this;
    }

    public function getAuthorGuid(): ?int
    {
        return $this->authorGuid;
    }

    public function setAuthorGuid(int $authorGuid): self
    {
        $this->authorGuid = $authorGuid;

        return $this;
    }

    public function getPostText(): ?string
    {
        return $this->postText;
    }

    public function setPostText(string $postText): self
    {
        $this->postText = $postText;

        return $this;
    }

    public function getPostTopic(): ?string
    {
        return $this->postTopic;
    }

    public function setPostTopic(string $postTopic): self
    {
        $this->postTopic = $postTopic;

        return $this;
    }

    public function getPostSmile(): ?bool
    {
        return $this->postSmile;
    }

    public function setPostSmile(bool $postSmile): self
    {
        $this->postSmile = $postSmile;

        return $this;
    }

    public function getPostDate(): ?int
    {
        return $this->postDate;
    }

    public function setPostDate(int $postDate): self
    {
        $this->postDate = $postDate;

        return $this;
    }

    public function getLastEditAid(): ?int
    {
        return $this->lastEditAid;
    }

    public function setLastEditAid(int $lastEditAid): self
    {
        $this->lastEditAid = $lastEditAid;

        return $this;
    }

    public function getEditDate(): ?int
    {
        return $this->editDate;
    }

    public function setEditDate(int $editDate): self
    {
        $this->editDate = $editDate;

        return $this;
    }

    public function getPostIp(): ?string
    {
        return $this->postIp;
    }

    public function setPostIp(string $postIp): self
    {
        $this->postIp = $postIp;

        return $this;
    }

    public function getIconId(): ?int
    {
        return $this->iconId;
    }

    public function setIconId(int $iconId): self
    {
        $this->iconId = $iconId;

        return $this;
    }


}
