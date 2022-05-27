<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Mutate\AppendValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\Clear;
use Somnambulist\Components\Collection\Behaviours\Mutate\CombineValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\Fill;
use Somnambulist\Components\Collection\Behaviours\Mutate\Flip;
use Somnambulist\Components\Collection\Behaviours\Mutate\MergeValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\Pad;
use Somnambulist\Components\Collection\Behaviours\Mutate\Pop;
use Somnambulist\Components\Collection\Behaviours\Mutate\PrependValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\RemapKeys;
use Somnambulist\Components\Collection\Behaviours\Mutate\RemoveValue;
use Somnambulist\Components\Collection\Behaviours\Mutate\ReplaceValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\Reverse;
use Somnambulist\Components\Collection\Behaviours\Mutate\SetKeyValue;
use Somnambulist\Components\Collection\Behaviours\Mutate\Shift;
use Somnambulist\Components\Collection\Behaviours\Mutate\Shuffle;
use Somnambulist\Components\Collection\Behaviours\Mutate\UnionValues;
use Somnambulist\Components\Collection\Behaviours\Mutate\UnsetKey;
use Somnambulist\Components\Collection\Behaviours\Mutate\When;

/**
 * Trait Mutable
 *
 * Combines many traits that can mutate the collection into a single trait.
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\Mutable
 */
trait Mutable
{

    use AppendValues;
    use Clear;
    use CombineValues;
    use Fill;
    use Flip;
    use MergeValues;
    use Pad;
    use Pop;
    use PrependValues;
    use RemapKeys;
    use RemoveValue;
    use ReplaceValues;
    use Reverse;
    use SetKeyValue;
    use Shift;
    use Shuffle;
    use UnionValues;
    use UnsetKey;
    use When;

}
