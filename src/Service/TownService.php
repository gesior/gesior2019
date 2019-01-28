<?php

namespace App\Service;

use Symfony\Contracts\Translation\TranslatorInterface;

class TownService
{
    use TranslatorTrait;

    const BUGGED_TOWN_NAME = 'BUGGED TOWN ID!';
    private static $towns = [
        1 => 'Ab',
        2 => 'car',
        3 => 'thais',
    ];

    public function getTowns()
    {
        return self::$towns;
    }

    public function getTownIds()
    {
        return array_keys(self::$towns);
    }

    public function getName($townId)
    {
        return (self::$towns[$townId]) ? self::$towns[$townId] : self::BUGGED_TOWN_NAME;
    }

}
