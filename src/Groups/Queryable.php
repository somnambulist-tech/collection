<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Query\All;
use Somnambulist\Collection\Behaviours\Query\Contains;
use Somnambulist\Collection\Behaviours\Query\Extract;
use Somnambulist\Collection\Behaviours\Query\Find;
use Somnambulist\Collection\Behaviours\Query\First;
use Somnambulist\Collection\Behaviours\Query\GetValueWithDotNotation;
use Somnambulist\Collection\Behaviours\Query\HasKeyWithDotNotation;
use Somnambulist\Collection\Behaviours\Query\Keys;
use Somnambulist\Collection\Behaviours\Query\Last;
use Somnambulist\Collection\Behaviours\Query\RemoveEmpty;
use Somnambulist\Collection\Behaviours\Query\RemoveNulls;
use Somnambulist\Collection\Behaviours\Query\SortKeys;
use Somnambulist\Collection\Behaviours\Query\SortValues;
use Somnambulist\Collection\Behaviours\Query\Unique;
use Somnambulist\Collection\Behaviours\Query\Value;
use Somnambulist\Collection\Behaviours\Query\Values;

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

    use All;
    use Contains;
    use Extract;
    use Find;
    use First;
    use GetValueWithDotNotation;
    use HasKeyWithDotNotation;
    use Keys;
    use Last;
    use RemoveEmpty;
    use RemoveNulls;
    use SortKeys;
    use SortValues;
    use Unique;
    use Value;
    use Values;

}
