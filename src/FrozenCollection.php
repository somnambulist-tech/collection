<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection;

use JsonSerializable;
use Somnambulist\Components\Collection\Behaviours\CannotAddOrRemoveItems;
use Somnambulist\Components\Collection\Behaviours\Proxyable;
use Somnambulist\Components\Collection\Contracts\CanAggregateItems;
use Somnambulist\Components\Collection\Contracts\Comparable as IsComparable;
use Somnambulist\Components\Collection\Contracts\Filterable as IsFilterable;
use Somnambulist\Components\Collection\Contracts\Immutable as IsImmutable;
use Somnambulist\Components\Collection\Contracts\Mappable as IsMappable;
use Somnambulist\Components\Collection\Contracts\Runnable as IsRunnable;
use Somnambulist\Components\Collection\Contracts\Serializable as IsSerializable;
use Somnambulist\Components\Collection\Contracts\Sortable as IsSortable;
use Somnambulist\Components\Collection\Groups\Aggregates;
use Somnambulist\Components\Collection\Groups\Assertable;
use Somnambulist\Components\Collection\Groups\Comparable;
use Somnambulist\Components\Collection\Groups\Exportable;
use Somnambulist\Components\Collection\Groups\Filterable;
use Somnambulist\Components\Collection\Groups\ImmutableQueryable;
use Somnambulist\Components\Collection\Groups\Mappable;
use Somnambulist\Components\Collection\Groups\Runnable;
use Somnambulist\Components\Collection\Groups\Sortable;
use Somnambulist\Components\Collection\Utils\MapProxy;
use Somnambulist\Components\Collection\Utils\RunProxy;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * Class FrozenCollection
 *
 * @package    Somnambulist\Components\Collection
 * @subpackage Somnambulist\Components\Collection\FrozenCollection
 *
 * @property-read MapProxy $map
 * @property-read RunProxy $run
 */
class FrozenCollection extends AbstractCollection implements
    CanAggregateItems,
    IsComparable,
    IsFilterable,
    IsImmutable,
    IsMappable,
    IsRunnable,
    IsSerializable,
    IsSortable,
    JsonSerializable
{

    use CannotAddOrRemoveItems;
    use Aggregates;
    use Assertable;
    use Comparable;
    use Exportable;
    use Filterable;
    use ImmutableQueryable;
    use Mappable;
    use Runnable;
    use Proxyable;
    use Sortable;

    public function __construct(mixed $items = [])
    {
        $this->items = Value::toArray($items);
    }
}
