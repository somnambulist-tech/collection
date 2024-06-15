<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * @property array $items
 */
trait UnionOnlyUniqueValues
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

        foreach ($items as $key => $item) {
            if ($this->contains($item)) {
                throw DuplicateItemException::found($item, $this->keys($item)->first());
            }
        }

        $this->items = $this->items + $items;

        return $this;
    }
}
