<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Mutate\CanAppend;
use Somnambulist\Collection\Behaviours\Mutate\CanCombine;
use Somnambulist\Collection\Behaviours\Mutate\CanFill;
use Somnambulist\Collection\Behaviours\Mutate\CanFlip;
use Somnambulist\Collection\Behaviours\Mutate\CanManipulateStrings;
use Somnambulist\Collection\Behaviours\Mutate\CanMerge;
use Somnambulist\Collection\Behaviours\Mutate\CanPad;
use Somnambulist\Collection\Behaviours\Mutate\CanPop;
use Somnambulist\Collection\Behaviours\Mutate\CanPrepend;
use Somnambulist\Collection\Behaviours\Mutate\CanRemapKeys;
use Somnambulist\Collection\Behaviours\Mutate\CanRemoveItem;
use Somnambulist\Collection\Behaviours\Mutate\CanRemoveKey;
use Somnambulist\Collection\Behaviours\Mutate\CanReplace;
use Somnambulist\Collection\Behaviours\Mutate\CanReverse;
use Somnambulist\Collection\Behaviours\Mutate\CanSetKey;
use Somnambulist\Collection\Behaviours\Mutate\CanShift;
use Somnambulist\Collection\Behaviours\Mutate\CanShuffle;
use Somnambulist\Collection\Behaviours\Mutate\CanUnion;
use Somnambulist\Collection\Behaviours\Mutate\Clearable;

/**
 * Trait Mutable
 *
 * Combines many traits that can mutate the collection into a single trait.
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Mutable
 */
trait Mutable
{

    use CanAppend;
    use CanCombine;
    use CanFill;
    use CanFlip;
    use CanManipulateStrings;
    use CanMerge;
    use CanPad;
    use CanPop;
    use CanPrepend;
    use CanRemapKeys;
    use CanRemoveItem;
    use CanRemoveKey;
    use CanReplace;
    use CanReverse;
    use CanSetKey;
    use CanShift;
    use CanShuffle;
    use CanUnion;
    use Clearable;

}
