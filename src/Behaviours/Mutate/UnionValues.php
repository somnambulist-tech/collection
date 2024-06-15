<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * @property array $items
 */
trait UnionValues
{

    /**
     * Union the collection with the given items.
     *
     * @param mixed $items
     *
     * @return Collection|static
     */
    public function union(mixed $items): Collection|static
    {
        $items = Value::toArray($items);

        Value::assertAllOfType($items, $this->type);

        $this->items = $this->items + $items;

        return $this;
    }
}
