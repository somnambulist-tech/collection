<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Collection\Utils\Value;

/**
 * Trait CanUnionSet
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanUnionSet
 *
 * @property array $items
 */
trait CanUnionSet
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
