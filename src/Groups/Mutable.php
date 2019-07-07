<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\CanAppend;
use Somnambulist\Collection\Behaviours\CanCombine;
use Somnambulist\Collection\Behaviours\CanFill;
use Somnambulist\Collection\Behaviours\CanFlip;
use Somnambulist\Collection\Behaviours\CanManipulateStrings;
use Somnambulist\Collection\Behaviours\CanMerge;
use Somnambulist\Collection\Behaviours\CanPad;
use Somnambulist\Collection\Behaviours\CanPop;
use Somnambulist\Collection\Behaviours\CanPrepend;
use Somnambulist\Collection\Behaviours\CanRemapKeys;
use Somnambulist\Collection\Behaviours\CanRemoveItem;
use Somnambulist\Collection\Behaviours\CanRemoveKey;
use Somnambulist\Collection\Behaviours\CanReplace;
use Somnambulist\Collection\Behaviours\CanReverse;
use Somnambulist\Collection\Behaviours\CanSetKey;
use Somnambulist\Collection\Behaviours\CanShift;
use Somnambulist\Collection\Behaviours\CanShuffle;
use Somnambulist\Collection\Behaviours\CanUnion;
use Somnambulist\Collection\Behaviours\Clearable;

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
