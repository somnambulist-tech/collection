<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\CanAddAndRemoveItems;
use Somnambulist\Collection\Behaviours\Freezeable;
use Somnambulist\Collection\Contracts\Comparable as IsDiffable;
use Somnambulist\Collection\Contracts\Filterable as IsFilterable;
use Somnambulist\Collection\Contracts\Freezable as IsFreezable;
use Somnambulist\Collection\Contracts\Mappable as IsMappable;
use Somnambulist\Collection\Contracts\Mutable as IsMutable;
use Somnambulist\Collection\Contracts\Runnable as IsRunnable;
use Somnambulist\Collection\Contracts\Serializable as IsSerializable;
use Somnambulist\Collection\Contracts\Sortable as IsSortable;
use Somnambulist\Collection\Groups\Assertable;
use Somnambulist\Collection\Groups\Comparable;
use Somnambulist\Collection\Groups\Exportable;
use Somnambulist\Collection\Groups\Mappable;
use Somnambulist\Collection\Groups\Mutable;
use Somnambulist\Collection\Groups\Partitionable;
use Somnambulist\Collection\Groups\Queryable;
use Somnambulist\Collection\Groups\Runnable;
use Somnambulist\Collection\Utils\RunProxy;
use Somnambulist\Collection\Utils\Value;

/**
 * Class MutableCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\MutableCollection
 */
class MutableCollection extends AbstractCollection implements IsMutable, IsFilterable, IsMappable, IsDiffable, IsFreezable, IsRunnable, IsSerializable, IsSortable
{

    use CanAddAndRemoveItems;
    use Assertable;
    use Comparable;
    use Exportable;
    use Freezeable;
    use Mappable;
    use Mutable;
    use Queryable;
    use Partitionable;
    use Runnable;

    /**
     * Constructor.
     *
     * @param mixed $items
     */
    public function __construct($items = [])
    {
        $this->items = Value::toArray($items);
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
