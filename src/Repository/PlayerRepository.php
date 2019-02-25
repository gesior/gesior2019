<?php

namespace App\Repository;

use App\Entity\Player;
use Doctrine\ORM\EntityRepository;

/**
 * @method Player findOneByName(string $name)
 */
class PlayerRepository extends EntityRepository
{
}
