<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\Assertion\Assert;
use Somnambulist\Collection\Behaviours\CanAddAndRemoveItems;
use Somnambulist\Collection\Behaviours\Export\ExportToArray;
use Somnambulist\Collection\Behaviours\Export\ExportToJson;
use Somnambulist\Collection\Behaviours\MapReduce\Collapse;
use Somnambulist\Collection\Behaviours\MapReduce\Map;
use Somnambulist\Collection\Behaviours\Mutate\AppendValues;
use Somnambulist\Collection\Behaviours\Mutate\Clear;
use Somnambulist\Collection\Behaviours\Mutate\CombineValues;
use Somnambulist\Collection\Behaviours\Mutate\MergeValues;
use Somnambulist\Collection\Behaviours\Mutate\Pop;
use Somnambulist\Collection\Behaviours\Mutate\PrependValues;
use Somnambulist\Collection\Behaviours\Mutate\RemoveValue;
use Somnambulist\Collection\Behaviours\Mutate\SetKeyValue;
use Somnambulist\Collection\Behaviours\Mutate\Shift;
use Somnambulist\Collection\Behaviours\Mutate\UnsetKey;
use Somnambulist\Collection\Behaviours\Pipes\RunCallableOnValues;
use Somnambulist\Collection\Behaviours\Query\All;
use Somnambulist\Collection\Behaviours\Query\Contains;
use Somnambulist\Collection\Behaviours\Query\FilterByKey;
use Somnambulist\Collection\Behaviours\Query\FilterValues;
use Somnambulist\Collection\Behaviours\Query\First;
use Somnambulist\Collection\Behaviours\Query\GetValue;
use Somnambulist\Collection\Behaviours\Query\HasKey;
use Somnambulist\Collection\Behaviours\Query\Keys;
use Somnambulist\Collection\Behaviours\Query\Last;
use Somnambulist\Collection\Behaviours\Query\Unique;
use Somnambulist\Collection\Behaviours\Query\Value;
use Somnambulist\Collection\Behaviours\Query\Values;

/**
 * Class SimpleCollection
 *
 * A basic collection class that operates on it's own keys. Values can be duplicated.
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\SimpleCollection
 */
class SimpleCollection extends AbstractCollection
{

    use CanAddAndRemoveItems;
    use All;
    use AppendValues;
    use Assert;
    use Clear;
    use Collapse;
    use CombineValues;
    use Contains;
    use FilterByKey;
    use FilterValues;
    use First;
    use GetValue;
    use HasKey;
    use Last;
    use Keys;
    use Map;
    use MergeValues;
    use RemoveValue;
    use Pop;
    use PrependValues;
    use RunCallableOnValues;
    use SetKeyValue;
    use Shift;
    use Unique;
    use UnsetKey;
    use Value;
    use Values;

    use ExportToArray;
    use ExportToJson;

}
