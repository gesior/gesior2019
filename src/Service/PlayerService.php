<?php

namespace App\Service;

use App\Entity\Account;
use App\Entity\Player;
use App\Security\OtsSecurityService;
use Doctrine\ORM\EntityManagerInterface;
use LogicException;
use Symfony\Contracts\Translation\TranslatorInterface;

class PlayerService
{
    use TranslatorTrait;

    const PASSWORD_MINIMUM_LENGHT = 4;
    const PASSWORD_MAXIMUM_LENGHT = 20;

    private $entityManager;
    private $translator;
    private $otsSecurityService;

    public function __construct(EntityManagerInterface $entityManager, TranslatorInterface $translator,
                                OtsSecurityService $otsSecurityService)
    {
        $this->entityManager = $entityManager;
        $this->translator = $translator;
        $this->otsSecurityService = $otsSecurityService;
    }

    /**
     * @return Player
     */
    public function createPlayer(string $name, $vocationId, $townId)
    {
        $this->validateNameFormat($name);


        $player = new Player();

        return $player;
    }

    public function isOnline(Player $player)
    {
        /* TODO: load PlayerOnline data */
        return rand(1,2) == 1;
    }

    private function validateNameFormat($name)
    {
        if (strlen($name) < self::PASSWORD_MINIMUM_LENGHT) {
            throw new LogicException($this->translate('ACCOUNT.INVALID_PASSWORD_FORMAT.TOO_SHORT', ['%min%' => self::PASSWORD_MINIMUM_LENGHT]));
        }

        if (strlen($name) > self::PASSWORD_MAXIMUM_LENGHT) {
            throw new LogicException($this->translate('ACCOUNT.INVALID_PASSWORD_FORMAT.TOO_LONG', ['%max%' => self::PASSWORD_MAXIMUM_LENGHT]));
        }
    }
}
