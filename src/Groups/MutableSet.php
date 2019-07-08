<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Mutate\CanAppendSet;
use Somnambulist\Collection\Behaviours\Mutate\CanCombineSet;
use Somnambulist\Collection\Behaviours\Mutate\CanManipulateStrings;
use Somnambulist\Collection\Behaviours\Mutate\CanMergeSet;
use Somnambulist\Collection\Behaviours\Mutate\CanPop;
use Somnambulist\Collection\Behaviours\Mutate\CanPrependSet;
use Somnambulist\Collection\Behaviours\Mutate\CanRemapKeys;
use Somnambulist\Collection\Behaviours\Mutate\CanRemoveItem;
use Somnambulist\Collection\Behaviours\Mutate\CanRemoveKey;
use Somnambulist\Collection\Behaviours\Mutate\CanReverse;
use Somnambulist\Collection\Behaviours\Mutate\CanSetKey;
use Somnambulist\Collection\Behaviours\Mutate\CanShift;
use Somnambulist\Collection\Behaviours\Mutate\CanShuffle;
use Somnambulist\Collection\Behaviours\Mutate\CanUnionSet;
use Somnambulist\Collection\Behaviours\Mutate\Clearable;

/**
 * Trait MutableSet
 *
 * Combines many traits that can mutate the collection into a single trait.
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\MutableSet
 */
trait MutableSet
{

    use CanAppendSet;
    use CanCombineSet;
    use CanManipulateStrings;
    use CanMergeSet;
    use CanPop;
    use CanPrependSet;
    use CanRemapKeys;
    use CanRemoveItem;
    use CanRemoveKey;
    use CanReverse;
    use CanSetKey;
    use CanShift;
    use CanShuffle;
    use CanUnionSet;
    use Clearable;

}
