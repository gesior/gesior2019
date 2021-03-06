<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServerConfig
 *
 * @ORM\Table(name="server_config")
 * @ORM\Entity
 */
class ServerConfig
{
    /**
     * @var string
     *
     * @ORM\Column(name="config", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $config;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=256, nullable=false)
     */
    private $value = '';

    public function getConfig(): ?string
    {
        return $this->config;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }


}
