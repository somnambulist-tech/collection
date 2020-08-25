<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Mutate\AppendOnlyUniqueValues;
use Somnambulist\Collection\Behaviours\Mutate\Clear;
use Somnambulist\Collection\Behaviours\Mutate\CombineOnlyUniqueValues;
use Somnambulist\Collection\Behaviours\Mutate\MergeOnlyUniqueValues;
use Somnambulist\Collection\Behaviours\Mutate\Pop;
use Somnambulist\Collection\Behaviours\Mutate\PrependOnlyUniqueValues;
use Somnambulist\Collection\Behaviours\Mutate\RemapKeys;
use Somnambulist\Collection\Behaviours\Mutate\RemoveValue;
use Somnambulist\Collection\Behaviours\Mutate\Reverse;
use Somnambulist\Collection\Behaviours\Mutate\SetKeyValue;
use Somnambulist\Collection\Behaviours\Mutate\Shift;
use Somnambulist\Collection\Behaviours\Mutate\Shuffle;
use Somnambulist\Collection\Behaviours\Mutate\UnionOnlyUniqueValues;
use Somnambulist\Collection\Behaviours\Mutate\UnsetKey;

/**
 * Trait MutableSet
 *
 * Combines many traits that can mutate the collection into a single trait and
 * constrains them to unique values.
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\MutableSet
 */
trait MutableSet
{

    use AppendOnlyUniqueValues;
    use CombineOnlyUniqueValues;
    use MergeOnlyUniqueValues;
    use Pop;
    use PrependOnlyUniqueValues;
    use RemapKeys;
    use RemoveValue;
    use UnsetKey;
    use Reverse;
    use SetKeyValue;
    use Shift;
    use Shuffle;
    use UnionOnlyUniqueValues;
    use Clear;

}
