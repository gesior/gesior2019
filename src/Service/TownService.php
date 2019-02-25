<?php

namespace App\Service;

class TownService
{
    const BUGGED_TOWN_NAME = 'BUGGED TOWN ID!';
    private static $towns = [
        1 => 'Rookgaard',
        2 => 'Carlin',
        3 => 'Thais',
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
