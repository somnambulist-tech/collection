<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection;

use JsonSerializable;
use Somnambulist\Components\Collection\Behaviours\CannotAddDuplicateItems;
use Somnambulist\Components\Collection\Behaviours\Freezeable;
use Somnambulist\Components\Collection\Behaviours\Proxyable;
use Somnambulist\Components\Collection\Contracts\Assertable as IsAssertable;
use Somnambulist\Components\Collection\Contracts\CanAggregateItems;
use Somnambulist\Components\Collection\Contracts\CanManipulateStrings;
use Somnambulist\Components\Collection\Contracts\Comparable as IsComparable;
use Somnambulist\Components\Collection\Contracts\Filterable as IsFilterable;
use Somnambulist\Components\Collection\Contracts\Freezable as IsFreezable;
use Somnambulist\Components\Collection\Contracts\Mappable as IsMappable;
use Somnambulist\Components\Collection\Contracts\Mutable as IsMutable;
use Somnambulist\Components\Collection\Contracts\Runnable as IsRunnable;
use Somnambulist\Components\Collection\Contracts\Serializable as IsSerializable;
use Somnambulist\Components\Collection\Contracts\Sortable as IsSortable;
use Somnambulist\Components\Collection\Groups\Aggregates;
use Somnambulist\Components\Collection\Groups\Assertable;
use Somnambulist\Components\Collection\Groups\Comparable;
use Somnambulist\Components\Collection\Groups\Exportable;
use Somnambulist\Components\Collection\Groups\Filterable;
use Somnambulist\Components\Collection\Groups\Mappable;
use Somnambulist\Components\Collection\Groups\MutableSet as Mutable;
use Somnambulist\Components\Collection\Groups\Partitionable;
use Somnambulist\Components\Collection\Groups\Queryable;
use Somnambulist\Components\Collection\Groups\Runnable;
use Somnambulist\Components\Collection\Groups\Sortable;
use Somnambulist\Components\Collection\Groups\StringHelpers;
use Somnambulist\Components\Collection\Utils\MapProxy;
use Somnambulist\Components\Collection\Utils\RunProxy;
use Somnambulist\Components\Collection\Utils\Value;

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
 * @package    Somnambulist\Components\Collection
 * @subpackage Somnambulist\Components\Collection\MutableSet
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

    public function __construct(mixed $items = [])
    {
        foreach (Value::toArray($items) as $key => $value) {
            $this->set($key, $value);
        }
    }
}
