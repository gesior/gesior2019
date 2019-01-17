<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GuildWars
 *
 * @ORM\Table(name="guild_wars", indexes={@ORM\Index(name="guild2", columns={"guild2"}), @ORM\Index(name="guild1", columns={"guild1"})})
 * @ORM\Entity
 */
class GuildWar
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
     * @ORM\Column(name="guild1", type="integer", nullable=false)
     */
    private $guild1 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="guild2", type="integer", nullable=false)
     */
    private $guild2 = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name1", type="string", length=255, nullable=false)
     */
    private $name1;

    /**
     * @var string
     *
     * @ORM\Column(name="name2", type="string", length=255, nullable=false)
     */
    private $name2;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="started", type="bigint", nullable=false)
     */
    private $started = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ended", type="bigint", nullable=false)
     */
    private $ended = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="fraglimit", type="integer", nullable=false)
     */
    private $fraglimit = '0';


}
