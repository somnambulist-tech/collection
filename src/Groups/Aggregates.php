<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Aggregate\AggregateValues;
use Somnambulist\Components\Collection\Behaviours\Aggregate\CountBy;

trait Aggregates
{

    use AggregateValues;
    use CountBy;

}
