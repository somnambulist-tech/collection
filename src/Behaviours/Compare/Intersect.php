<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Compare;

use Somnambulist\Collection\Utils\Value;
use function array_intersect;
use function array_intersect_key;

/**
 * Trait Intersect
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Compare\Intersect
 *
 * @property array $items
 */
trait Intersect
{

    /**
     * Intersect the collection with the given items.
     *
     * @link https://www.php.net/array_intersect
     *
     * @param mixed $items
     *
     * @return static
     */
    public function intersect($items)
    {
        return $this->new(array_intersect($this->items, Value::toArray($items)));
    }

    /**
     * Intersect the collection with the given items by key.
     *
     * @link https://www.php.net/array_intersect_key
     *
     * @param mixed $items
     *
     * @return static
     */
    public function intersectByKeys($items)
    {
        return $this->new(array_intersect_key($this->items, Value::toArray($items)));
    }
}
