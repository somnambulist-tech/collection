<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Mutate\AppendOnlyUniqueValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\Clear;
use Somnambulist\Components\Collection\Behaviours\Mutate\CombineOnlyUniqueValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\MergeOnlyUniqueValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\Pop;
use Somnambulist\Components\Collection\Behaviours\Mutate\PrependOnlyUniqueValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\RemapKeys;
use Somnambulist\Components\Collection\Behaviours\Mutate\RemoveValue;
use Somnambulist\Components\Collection\Behaviours\Mutate\Reverse;
use Somnambulist\Components\Collection\Behaviours\Mutate\SetKeyValue;
use Somnambulist\Components\Collection\Behaviours\Mutate\Shift;
use Somnambulist\Components\Collection\Behaviours\Mutate\Shuffle;
use Somnambulist\Components\Collection\Behaviours\Mutate\UnionOnlyUniqueValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\UnsetKey;
use Somnambulist\Components\Collection\Behaviours\Mutate\When;

/**
 * Trait MutableSet
 *
 * Combines many traits that can mutate the collection into a single trait and
 * constrains them to unique values.
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\MutableSet
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
    use When;

}
