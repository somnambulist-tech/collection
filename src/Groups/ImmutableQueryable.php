<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Mutate\ShuffleNewCollection;
use Somnambulist\Components\Collection\Behaviours\Query\All;
use Somnambulist\Components\Collection\Behaviours\Query\Contains;
use Somnambulist\Components\Collection\Behaviours\Query\Extract;
use Somnambulist\Components\Collection\Behaviours\Query\Find;
use Somnambulist\Components\Collection\Behaviours\Query\First;
use Somnambulist\Components\Collection\Behaviours\Query\GetValueWithDotNotation;
use Somnambulist\Components\Collection\Behaviours\Query\HasKeyWithDotNotation;
use Somnambulist\Components\Collection\Behaviours\Query\Keys;
use Somnambulist\Components\Collection\Behaviours\Query\Last;
use Somnambulist\Components\Collection\Behaviours\Query\RandomValue;
use Somnambulist\Components\Collection\Behaviours\Query\RemoveEmpty;
use Somnambulist\Components\Collection\Behaviours\Query\RemoveNulls;
use Somnambulist\Components\Collection\Behaviours\Query\Unique;
use Somnambulist\Components\Collection\Behaviours\Query\Value;
use Somnambulist\Components\Collection\Behaviours\Query\Values;

/**
 * Trait ImmutableQueryable
 *
 * Groups a set of traits for getting or checking items in a Collection but does not
 * allow modifications to the collection.
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\ImmutableQueryable
 */
trait ImmutableQueryable
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
    use RandomValue;
    use RemoveEmpty;
    use RemoveNulls;
    use ShuffleNewCollection;
    use Unique;
    use Value;
    use Values;

}
