<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\CannotAddDuplicateItems;
use Somnambulist\Collection\Behaviours\Freezeable;
use Somnambulist\Collection\Contracts\Comparable as IsDiffable;
use Somnambulist\Collection\Contracts\Filterable as IsFilterable;
use Somnambulist\Collection\Contracts\Freezable as IsFreezable;
use Somnambulist\Collection\Contracts\Mappable as IsMappable;
use Somnambulist\Collection\Contracts\Mutable as IsMutable;
use Somnambulist\Collection\Contracts\Runnable as IsRunnable;
use Somnambulist\Collection\Contracts\Serializable as IsSerializable;
use Somnambulist\Collection\Contracts\Sortable as IsSortable;
use Somnambulist\Collection\Groups\Aggregates;
use Somnambulist\Collection\Groups\Comparable;
use Somnambulist\Collection\Groups\Exportable;
use Somnambulist\Collection\Groups\Filterable;
use Somnambulist\Collection\Groups\Mappable;
use Somnambulist\Collection\Groups\Mutable;
use Somnambulist\Collection\Groups\Partitionable;
use Somnambulist\Collection\Groups\Queryable;
use Somnambulist\Collection\Groups\Runnable;
use Somnambulist\Collection\Utils\RunProxy;
use Somnambulist\Collection\Utils\Value;

/**
 * Class MutableSet
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\MutableSet
 */
class MutableSet extends AbstractCollection implements IsMutable, IsFilterable, IsMappable, IsDiffable, IsFreezable, IsSerializable, IsSortable
{

    use CannotAddDuplicateItems;
    use Aggregates;
    use Comparable;
    use Exportable;
    use Filterable;
    use Freezeable;
    use Mappable;
    use Mutable;
    use Partitionable;
    use Queryable;
    use Runnable;

    /**
     * Constructor.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        foreach (Value::toArray($items) as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * @param string $name
     *
     * @return mixed|static
     */
    public function __get($name)
    {
        if ('run' === $name && $this instanceof IsRunnable) {
            return new RunProxy($this);
        }

        return $this->offsetGet($name);
    }
}
