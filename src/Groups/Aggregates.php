<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Aggregate\AggregateValues;
use Somnambulist\Collection\Behaviours\Aggregate\CountyBy;

/**
 * Trait Aggregates
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Aggregates
 */
trait Aggregates
{

    use AggregateValues;
    use CountyBy;

}
