<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Aggregate\AggregateValues;
use Somnambulist\Components\Collection\Behaviours\Aggregate\CountBy;

/**
 * Trait Aggregates
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\Aggregates
 */
trait Aggregates
{

    use AggregateValues;
    use CountBy;

}
