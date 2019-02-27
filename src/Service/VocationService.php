<?php

namespace App\Service;


class VocationService
{
    const BUGGED_VOCATION_NAME = 'BUGGED VOCATION ID!';

    private static $vocationNames = [
        0 => 'Rookgaard',
        1 => 'Sorcerer',
        2 => 'Druid',
        3 => 'Paladin',
        4 => 'Knight',
        5 => 'Master Sorcerer',
        6 => 'Elder Druid',
        7 => 'Royal Paladin',
        8 => 'Elite Knight',
    ];

    private static $vocationShortNames = [
        0 => 'R',
        1 => 'S',
        2 => 'D',
        3 => 'P',
        4 => 'K',
        5 => 'MS',
        6 => 'ED',
        7 => 'RP',
        8 => 'EK',
    ];

    public function getVocations()
    {
        return self::$vocationNames;
    }

    public function getVocationIds()
    {
        return array_keys(self::$vocationNames);
    }

    public function getName($vocationId)
    {
        return (self::$vocationNames[$vocationId]) ? self::$vocationNames[$vocationId] : self::BUGGED_VOCATION_NAME;
    }

    public function getShortName($vocationId)
    {
        return (self::$vocationShortNames[$vocationId]) ? self::$vocationShortNames[$vocationId] : self::BUGGED_VOCATION_NAME;
    }
}
