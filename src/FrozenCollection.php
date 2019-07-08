<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\CannotAddOrRemoveItems;
use Somnambulist\Collection\Contracts\Comparable as IsDiffable;
use Somnambulist\Collection\Contracts\Filterable as IsFilterable;
use Somnambulist\Collection\Contracts\ImmutableCollection as IsImmutable;
use Somnambulist\Collection\Contracts\Mappable as IsMappable;
use Somnambulist\Collection\Contracts\Runnable as IsRunnable;
use Somnambulist\Collection\Contracts\Serializable as IsSerializable;
use Somnambulist\Collection\Groups\Comparable;
use Somnambulist\Collection\Groups\Exportable;
use Somnambulist\Collection\Groups\Filterable;
use Somnambulist\Collection\Groups\ImmutableQueryable;
use Somnambulist\Collection\Groups\Mappable;
use Somnambulist\Collection\Groups\Runnable;
use Somnambulist\Collection\Utils\RunProxy;
use Somnambulist\Collection\Utils\Value;

/**
 * Class FrozenCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\FrozenCollection
 */
class FrozenCollection extends AbstractCollection implements IsImmutable, IsFilterable, IsMappable, IsDiffable, IsSerializable
{

    use CannotAddOrRemoveItems;
    use Comparable;
    use Exportable;
    use Filterable;
    use ImmutableQueryable;
    use Mappable;
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
