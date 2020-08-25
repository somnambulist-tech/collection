<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use JsonSerializable;
use Somnambulist\Collection\Behaviours\CannotAddDuplicateItems;
use Somnambulist\Collection\Behaviours\Freezeable;
use Somnambulist\Collection\Behaviours\Proxyable;
use Somnambulist\Collection\Contracts\CanAggregateItems;
use Somnambulist\Collection\Contracts\CanManipulateStrings;
use Somnambulist\Collection\Contracts\Assertable as IsAssertable;
use Somnambulist\Collection\Contracts\Comparable as IsComparable;
use Somnambulist\Collection\Contracts\Filterable as IsFilterable;
use Somnambulist\Collection\Contracts\Freezable as IsFreezable;
use Somnambulist\Collection\Contracts\Mappable as IsMappable;
use Somnambulist\Collection\Contracts\Mutable as IsMutable;
use Somnambulist\Collection\Contracts\Runnable as IsRunnable;
use Somnambulist\Collection\Contracts\Serializable as IsSerializable;
use Somnambulist\Collection\Contracts\Sortable as IsSortable;
use Somnambulist\Collection\Groups\Aggregates;
use Somnambulist\Collection\Groups\Assertable;
use Somnambulist\Collection\Groups\Comparable;
use Somnambulist\Collection\Groups\Exportable;
use Somnambulist\Collection\Groups\Filterable;
use Somnambulist\Collection\Groups\Mappable;
use Somnambulist\Collection\Groups\MutableSet as Mutable;
use Somnambulist\Collection\Groups\Partitionable;
use Somnambulist\Collection\Groups\Queryable;
use Somnambulist\Collection\Groups\Runnable;
use Somnambulist\Collection\Groups\Sortable;
use Somnambulist\Collection\Groups\StringHelpers;
use Somnambulist\Collection\Utils\MapProxy;
use Somnambulist\Collection\Utils\RunProxy;
use Somnambulist\Collection\Utils\Value;

/**
 * Class MutableSet
 *
 * Note: this is not a true set, in that string keys are allowed.
 *
 * A set only contains the value once. This implementation attempts to keep
 * duplicate values out and will raise an exception if a duplicate is found
 * during any mutation operation.
 *
 * Certain mutations cannot be used in a Set, e.g. pad, fill, fillKeys as they
 * generate the same value for every key.
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\MutableSet
 *
 * @property-read MapProxy $map
 * @property-read RunProxy $run
 */
class MutableSet extends AbstractCollection implements
    CanAggregateItems,
    CanManipulateStrings,
    IsAssertable,
    IsComparable,
    IsFilterable,
    IsFreezable,
    IsMappable,
    IsMutable,
    IsRunnable,
    IsSerializable,
    IsSortable,
    JsonSerializable
{

    use CannotAddDuplicateItems;
    use Assertable;
    use Aggregates;
    use Comparable;
    use Exportable;
    use Filterable;
    use Freezeable;
    use Mappable;
    use Mutable;
    use Partitionable;
    use Proxyable;
    use Queryable;
    use Runnable;
    use Sortable;
    use StringHelpers;

    protected ?string $collectionClass = MutableCollection::class;

    public function __construct($items = [])
    {
        foreach (Value::toArray($items) as $key => $value) {
            $this->set($key, $value);
        }
    }
}
