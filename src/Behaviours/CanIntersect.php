<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Utils\Value;
use function array_intersect;
use function array_intersect_key;

/**
 * Trait CanIntersect
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanIntersect
 *
 * @property array $items
 */
trait CanIntersect
{

    /**
     * Intersect the collection with the given items.
     *
     * @param mixed $items
     *
     * @return static
     */
    public function intersect($items): self
    {
        return new static(array_intersect($this->items, Value::toArray($items)));
    }

    /**
     * Intersect the collection with the given items by key.
     *
     * @param mixed $items
     *
     * @return static
     */
    public function intersectByKeys($items): self
    {
        return new static(array_intersect_key($this->items, Value::toArray($items)));
    }
}
