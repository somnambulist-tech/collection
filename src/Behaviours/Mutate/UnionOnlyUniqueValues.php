<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * Trait UnionOnlyUniqueValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\UnionOnlyUniqueValues
 *
 * @property array $items
 */
trait UnionOnlyUniqueValues
{

    /**
     * Union the collection with the given items.
     *
     * @param mixed $items
     *
     * @return static
     */
    public function union($items)
    {
        $items = Value::toArray($items);

        foreach ($items as $key => $item) {
            if ($this->contains($item)) {
                throw DuplicateItemException::found($item, $this->keys($item)->first());
            }
        }

        $this->items = $this->items + $items;

        return $this;
    }
}
