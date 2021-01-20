<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection;

use JsonSerializable;
use Somnambulist\Components\Collection\Behaviours\CanAddAndRemoveItems;
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
use Somnambulist\Components\Collection\Groups\Mutable;
use Somnambulist\Components\Collection\Groups\Partitionable;
use Somnambulist\Components\Collection\Groups\Queryable;
use Somnambulist\Components\Collection\Groups\Runnable;
use Somnambulist\Components\Collection\Groups\Sortable;
use Somnambulist\Components\Collection\Groups\StringHelpers;
use Somnambulist\Components\Collection\Utils\MapProxy;
use Somnambulist\Components\Collection\Utils\RunProxy;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * Class MutableCollection
 *
 * @package    Somnambulist\Components\Collection
 * @subpackage Somnambulist\Components\Collection\MutableCollection
 *
 * @property-read MapProxy $map
 * @property-read RunProxy $run
 */
class MutableCollection extends AbstractCollection implements
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

    use CanAddAndRemoveItems;
    use Aggregates;
    use Assertable;
    use Comparable;
    use Exportable;
    use Filterable;
    use Freezeable;
    use Mappable;
    use Mutable;
    use Queryable;
    use Partitionable;
    use Proxyable;
    use Runnable;
    use Sortable;
    use StringHelpers;

    public function __construct(mixed $items = [])
    {
        $this->items = Value::toArray($items);
    }
}
