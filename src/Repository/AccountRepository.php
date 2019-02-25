<?php

namespace App\Repository;

use App\Entity\Account;
use Doctrine\ORM\EntityRepository;

/**
 * @method Account|null findOneByName(string $name)
 */
class AccountRepository extends EntityRepository
{
}
