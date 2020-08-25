<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Aggregate\AggregateValues;
use Somnambulist\Collection\Behaviours\Aggregate\CountBy;

/**
 * Trait Aggregates
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Aggregates
 */
trait Aggregates
{

    use AggregateValues;
    use CountBy;

}
