<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use JsonSerializable;
use Somnambulist\Collection\Behaviours\CanAddAndRemoveItems;
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
use Somnambulist\Collection\Groups\Mutable;
use Somnambulist\Collection\Groups\Partitionable;
use Somnambulist\Collection\Groups\Queryable;
use Somnambulist\Collection\Groups\Runnable;
use Somnambulist\Collection\Groups\Sortable;
use Somnambulist\Collection\Groups\StringHelpers;
use Somnambulist\Collection\Utils\MapProxy;
use Somnambulist\Collection\Utils\RunProxy;
use Somnambulist\Collection\Utils\Value;

/**
 * Class MutableCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\MutableCollection
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

    public function __construct($items = [])
    {
        $this->items = Value::toArray($items);
    }
}
