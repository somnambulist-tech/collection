<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Aggregate\CanAggregateItems;
use Somnambulist\Collection\Behaviours\Aggregate\CanCountyBy;

/**
 * Trait Aggregates
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Aggregates
 */
trait Aggregates
{

    use CanAggregateItems;
    use CanCountyBy;

}
