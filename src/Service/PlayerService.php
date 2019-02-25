<?php

namespace App\Service;

use App\Entity\Player;
use App\Security\OtsSecurityService;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;
use LogicException;
use RuntimeException;
use Symfony\Contracts\Translation\TranslatorInterface;

class PlayerService
{
    use TranslatorTrait;

    const SEX_MALE = 0;
    const SEX_FEMALE = 1;

    const SEX_LIST = [self::SEX_MALE, self::SEX_FEMALE];

    const NAME_MINIMUM_LENGTH = 2;
    const NAME_MAXIMUM_LENGHT = 20;
    const NAME_ALLOWED_LETTERS = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM-' ";
    const NAME_BLOCKED_NAMES = ["gm", "cm", "god", "tutor"];
    const NAME_INVALID_FIRST_WORDS = ["gm ", "cm ", "god ", "tutor ", "'", "-", " "];
    const NAME_BLOCKED_LAST_WORDS = ["'", "-", " "];
    const NAME_BLOCKED_WORDS = [
        "gamemaster",
        "game master",
        "game-master",
        "game'master",
        "--",
        "''",
        "'-",
        "-'",
        "- ",
        " -",
        " '",
        "' ",
        "  ",
    ];
    const NAME_MAXIMUM_LETTERS_COUNT = ["'" => 2, "-" => 2, " " => 4];
    const NAME_MAXIMUM_SAME_LETTER_SEQUENCE_LENGTH = 2;

    private $entityManager;
    private $translator;
    private $otsSecurityService;
    /** @var VocationService */
    private $vocationService;
    /** @var TownService */
    private $townService;

    public function __construct(
        EntityManagerInterface $entityManager,
        TranslatorInterface $translator,
        OtsSecurityService $otsSecurityService,
        VocationService $vocationService,
        TownService $townService
    ) {
        $this->entityManager = $entityManager;
        $this->translator = $translator;
        $this->otsSecurityService = $otsSecurityService;
        $this->vocationService = $vocationService;
        $this->townService = $townService;
    }

    /**
     * @param string $name
     * @param int $sex
     * @param int $vocationId
     * @param int $townId
     * @return Player
     */
    public function createPlayer(string $name, int $sex, int $vocationId, int $townId)
    {
        $nameValidationError = $this->validateNameFormat($name);
        if ($nameValidationError !== false) {
            throw new InvalidArgumentException($nameValidationError);
        }

        if (!in_array($sex, self::SEX_LIST)) {
            throw new InvalidArgumentException("invalid sex");
        }
        if (!$this->isValidVocationTown($vocationId, $townId)) {
            throw new InvalidArgumentException("invalid vocation and town config");
        }

        $sampleCharacter = $this->getNewCharacterSample($vocationId);
        if (!$sampleCharacter) {
            throw new RuntimeException("wtf");
        }

        if ($name != 'asdasdasd') {
            throw new InvalidArgumentException("final fail");
        }

        $formattedName = $this->reformatName($name);
        $player = new Player();

        return $player;
    }

    public function getNewCharacterVocations()
    {
        $newCharacterVocations = [];
        foreach ($this->getNewCharacterVocationTowns() as $vocationId => $townIds) {
            $newCharacterVocations[$vocationId] = $this->vocationService->getName($vocationId);
        }
        return $newCharacterVocations;
    }

    public function getNewCharacterTowns()
    {
        $newCharacterTowns = [];
        foreach ($this->getNewCharacterVocationTowns() as $vocationId => $townIds) {
            foreach ($townIds as $townId) {
                $newCharacterTowns[$townId] = $this->townService->getName($townId);
            }
        }
        return $newCharacterTowns;
    }

    public function getNewCharacterVocationTowns()
    {
        return [
            0 => [1],
            1 => [2, 3],
            2 => [2, 3],
            3 => [2, 3],
            4 => [2, 3],
        ];
    }

    public function getNewCharacterSample(int $vocationId)
    {
        $vocationSampleCharacterNames = [
            0 => '0Rook Sample',
            1 => '1Sorcerer Sample',
            2 => '2Druid Sample',
            3 => '3Paladin Sample',
            4 => '4Knight Sample',
        ];

        if (!isset($vocationSampleCharacterNames[$vocationId])) {
            throw new LogicException('Cannot find configuration for vocation: ' . $vocationId);
        }

        $sampleCharacterName = $vocationSampleCharacterNames[$vocationId];

        $playerSample = $this->entityManager->getRepository(Player::class)->findOneByName($sampleCharacterName);

        if (!$playerSample) {
            throw new LogicException('Cannot find sample character by name: ' . $sampleCharacterName);
        }

        return $playerSample;
    }

    public function isValidVocationTown(int $vocationId, int $townId)
    {
        $vocationTowns = $this->getNewCharacterVocationTowns();
        return isset($vocationTowns[$vocationId]) && in_array($townId, ($vocationTowns[$vocationId]));
    }

    public function isOnline(Player $player)
    {
        /* TODO: load PlayerOnline data */
        return rand(1, 2) == 1;
    }


    /**
     * Formats name in classic tibia format.
     *
     * @param string $name
     * @return string formatted name
     */
    public function reformatName(string $name): string
    {
        $formattedName = strtoupper($name[0]);

        for ($i = 1; $i < strlen($name); ++$i) {
            $prevCharacter = $name[$i - 1];
            if ($prevCharacter === "'" || $prevCharacter === '-') {
                // after ' and -: player decide
                $formattedName .= $name[$i];
            } elseif ($prevCharacter === " ") {
                // after space: big letter
                $formattedName .= strtoupper($name[$i]);
            } else {
                // other case: small letter
                $formattedName .= strtolower($name[$i]);
            }
        }

        return $formattedName;
    }

    /**
     * @param string $name
     * @return string
     */
    public function validateNameFormat(string $name)
    {
        function spaceToWord($text): string
        {
            return str_replace(' ', '[space]', $text);
        }

        $nameLower = strtolower($name);

        if (strlen($name) < self::NAME_MINIMUM_LENGTH) {
            return $this->translate('PLAYER.NAME.TOO_SHORT',
                [
                    '%min%' => self::NAME_MINIMUM_LENGTH,
                ]
            );
        }

        if (strlen($name) > self::NAME_MAXIMUM_LENGHT) {
            return $this->translate(
                'PLAYER.NAME.TOO_LONG',
                [
                    '%max%' => self::NAME_MAXIMUM_LENGHT,
                ]
            );
        }

        if (strlen($name) != strspn($name, self::NAME_ALLOWED_LETTERS)) {
            return $this->translate(
                'PLAYER.NAME.BLOCKED_CHARACTER',
                [
                    '%rule%' => self::NAME_ALLOWED_LETTERS,
                    '%value%' => substr($name, strspn($name, self::NAME_ALLOWED_LETTERS), 1),
                ]
            );
        }

        foreach (self::NAME_BLOCKED_NAMES as $illegalName) {
            if ($nameLower === $illegalName) {
                return $this->translate(
                    'PLAYER.NAME.BLOCKED_NAME',
                    [
                        '%rule%' => $illegalName,
                    ]
                );
            }
        }

        foreach (self::NAME_INVALID_FIRST_WORDS as $illegalFirstWord) {
            if (substr($nameLower, 0, strlen($illegalFirstWord)) === $illegalFirstWord) {
                return $this->translate(
                    'PLAYER.NAME.INVALID_FIRST_WORD',
                    [
                        '%rule%' => spaceToWord($illegalFirstWord),
                    ]
                );
            }
        }

        foreach (self::NAME_BLOCKED_LAST_WORDS as $illegalLastWord) {
            if (substr($nameLower, -strlen($illegalLastWord)) === $illegalLastWord) {
                return $this->translate(
                    'PLAYER.NAME.BLOCKED_LAST_WORD',
                    [
                        '%rule%' => spaceToWord($illegalLastWord),
                    ]
                );
            }
        }

        foreach (self::NAME_BLOCKED_WORDS as $illegalWord) {
            if (strpos($nameLower, $illegalWord) !== false) {
                return $this->translate(
                    'PLAYER.NAME.BLOCKED_WORD',
                    [
                        '%rule%' => spaceToWord($illegalWord),
                    ]
                );
            }
        }

        foreach (self::NAME_MAXIMUM_LETTERS_COUNT as $letter => $maxCount) {
            if (substr_count($nameLower, $letter) > $maxCount) {
                return $this->translate(
                    'PLAYER.NAME.MAXIMUM_LETTER_COUNT',
                    [
                        '%letter%' => spaceToWord($letter),
                        '%limit%' => $maxCount
                    ]
                );
            }
        }

        $previousLetter = $nameLower[0];
        $letterRepeats = 1;

        for ($i = 1; $i < strlen($nameLower); ++$i) {
            $currentLetter = $nameLower[$i];
            if ($currentLetter == $previousLetter) {
                $letterRepeats++;
            } else {
                $letterRepeats = 1;
            }

            if ($letterRepeats > self::NAME_MAXIMUM_SAME_LETTER_SEQUENCE_LENGTH) {
                return $this->translate(
                    'PLAYER.NAME.MAXIMUM_SAME_LETTER_SEQUENCE_LENGTH',
                    [
                        '%letter%' => spaceToWord($currentLetter),
                        '%limit%' => self::NAME_MAXIMUM_SAME_LETTER_SEQUENCE_LENGTH
                    ]
                );
            }
            $previousLetter = $currentLetter;
        }
        $player = $this->entityManager->getRepository(Player::class)->findOneByName($name);

        if ($player) {
            return $this->translate('PLAYER.NAME.ALREADY_EXISTS', ['%name%' => $name]);
        }

        return false;
    }
}
