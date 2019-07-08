<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Query\CanExtract;
use Somnambulist\Collection\Behaviours\Query\CanFilter;
use Somnambulist\Collection\Behaviours\Query\CanFilterKeys;
use Somnambulist\Collection\Behaviours\Query\CanFind;
use Somnambulist\Collection\Behaviours\Query\CanGetAll;
use Somnambulist\Collection\Behaviours\Query\CanGetFirst;
use Somnambulist\Collection\Behaviours\Query\CanGetKeys;
use Somnambulist\Collection\Behaviours\Query\CanGetLast;
use Somnambulist\Collection\Behaviours\Query\CanGetValue;
use Somnambulist\Collection\Behaviours\Query\CanGetValues;
use Somnambulist\Collection\Behaviours\Query\CanWalkForKey;
use Somnambulist\Collection\Behaviours\Query\CanWalkHasKey;
use Somnambulist\Collection\Behaviours\Query\Contains;
use Somnambulist\Collection\Behaviours\Query\Uniqueable;

/**
 * Trait ImmutableQueryable
 *
 * Groups a set of traits for getting or checking items in a Collection.
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\ImmutableQueryable
 */
trait ImmutableQueryable
{

    use CanFilter;
    use CanFilterKeys;
    use CanFind;
    use CanGetAll;
    use CanGetFirst;
    use CanGetKeys;
    use CanGetLast;
    use CanGetValue;
    use CanGetValues;
    use Contains;
    use Uniqueable;

    // cascade operations
    use CanExtract;
    use CanWalkForKey;
    use CanWalkHasKey;

}
