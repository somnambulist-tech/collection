<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\CanCollapse;
use Somnambulist\Collection\Behaviours\CanMap;
use Somnambulist\Collection\Behaviours\CanReduce;

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
    use CanMap;
    use CanReduce;

}
