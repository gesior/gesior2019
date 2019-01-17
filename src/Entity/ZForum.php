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


}
