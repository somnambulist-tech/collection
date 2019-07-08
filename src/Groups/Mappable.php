<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\MapReduce\CanCollapse;
use Somnambulist\Collection\Behaviours\MapReduce\CanFlatten;
use Somnambulist\Collection\Behaviours\MapReduce\CanMap;
use Somnambulist\Collection\Behaviours\MapReduce\CanReduce;

/**
 * Trait Mappable
 *
 * Methods for mapping and reducing items.
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Mappable
 */
trait Mappable
{

    use CanCollapse;
    use CanFlatten;
    use CanMap;
    use CanReduce;

}
