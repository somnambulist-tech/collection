<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_slice;

/**
 * Trait CanSlice
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanSlice
 *
 * @property array $items
 */
trait CanSlice
{

    /**
     * Extracts a portion of the Collection, returning a new Collection
     *
     * By default, preserves the keys.
     *
     * @link https://www.php.net/array_slice
     *
     * @param int      $offset
     * @param int|null $limit
     * @param bool     $keys
     *
     * @return static
     */
    public function slice($offset, $limit = null, $keys = true): self
    {
        return new static(array_slice($this->items, $offset, $limit, $keys));
    }
}
