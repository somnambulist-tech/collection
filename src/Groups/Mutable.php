<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Mutate\AppendValues;
use Somnambulist\Collection\Behaviours\Mutate\Clear;
use Somnambulist\Collection\Behaviours\Mutate\CombineValues;
use Somnambulist\Collection\Behaviours\Mutate\Fill;
use Somnambulist\Collection\Behaviours\Mutate\Flip;
use Somnambulist\Collection\Behaviours\Mutate\MergeValues;
use Somnambulist\Collection\Behaviours\Mutate\Pad;
use Somnambulist\Collection\Behaviours\Mutate\Pop;
use Somnambulist\Collection\Behaviours\Mutate\PrependValues;
use Somnambulist\Collection\Behaviours\Mutate\RemapKeys;
use Somnambulist\Collection\Behaviours\Mutate\RemoveValue;
use Somnambulist\Collection\Behaviours\Mutate\ReplaceValues;
use Somnambulist\Collection\Behaviours\Mutate\Reverse;
use Somnambulist\Collection\Behaviours\Mutate\SetKeyValue;
use Somnambulist\Collection\Behaviours\Mutate\Shift;
use Somnambulist\Collection\Behaviours\Mutate\Shuffle;
use Somnambulist\Collection\Behaviours\Mutate\UnionValues;
use Somnambulist\Collection\Behaviours\Mutate\UnsetKey;

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

}
