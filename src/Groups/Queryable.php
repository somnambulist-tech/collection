<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\CanAssert;
use Somnambulist\Collection\Behaviours\CanCountyBy;
use Somnambulist\Collection\Behaviours\CanExtract;
use Somnambulist\Collection\Behaviours\CanFilter;
use Somnambulist\Collection\Behaviours\CanFilterKeys;
use Somnambulist\Collection\Behaviours\CanFind;
use Somnambulist\Collection\Behaviours\CanGetAll;
use Somnambulist\Collection\Behaviours\CanGetFirst;
use Somnambulist\Collection\Behaviours\CanGetLast;
use Somnambulist\Collection\Behaviours\CanGetValue;
use Somnambulist\Collection\Behaviours\CanGetValues;
use Somnambulist\Collection\Behaviours\CanWalkForKey;
use Somnambulist\Collection\Behaviours\CanWalkHas;
use Somnambulist\Collection\Behaviours\Contains;
use Somnambulist\Collection\Behaviours\Uniqueable;

/**
 * Trait Queryable
 *
 * Groups a set of traits for getting or checking items in a Collection.
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Queryable
 */
trait Queryable
{

    use CanAssert;
    use CanCountyBy;
    use CanFilter;
    use CanFilterKeys;
    use CanFind;
    use CanGetAll;
    use CanGetFirst;
    use CanGetLast;
    use CanGetValue;
    use CanGetValues;
    use Contains;
    use Uniqueable;

    use CanExtract;
    use CanWalkForKey;
    use CanWalkHas;

}
