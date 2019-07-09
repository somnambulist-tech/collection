<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait UnionValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\UnionValues
 *
 * @property array $items
 */
trait UnionValues
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
        $this->items = $this->items + Value::toArray($items);

        return $this;
    }
}
