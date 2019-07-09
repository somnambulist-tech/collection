<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Query\All;
use Somnambulist\Collection\Behaviours\Query\Contains;
use Somnambulist\Collection\Behaviours\Query\Extract;
use Somnambulist\Collection\Behaviours\Query\FilterByKey;
use Somnambulist\Collection\Behaviours\Query\FilterValues;
use Somnambulist\Collection\Behaviours\Query\Find;
use Somnambulist\Collection\Behaviours\Query\First;
use Somnambulist\Collection\Behaviours\Query\GetValueWithDotNotation;
use Somnambulist\Collection\Behaviours\Query\HasKeyWithDotNotation;
use Somnambulist\Collection\Behaviours\Query\Keys;
use Somnambulist\Collection\Behaviours\Query\Last;
use Somnambulist\Collection\Behaviours\Query\Unique;
use Somnambulist\Collection\Behaviours\Query\Value;
use Somnambulist\Collection\Behaviours\Query\Values;

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

    use All;
    use Contains;
    use Extract;
    use FilterValues;
    use FilterByKey;
    use Find;
    use First;
    use GetValueWithDotNotation;
    use HasKeyWithDotNotation;
    use Keys;
    use Last;
    use Value;
    use Values;
    use Unique;

}
