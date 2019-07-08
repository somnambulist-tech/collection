<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function array_keys;
use function is_object;

/**
 * Trait CanGetKeys
 *
 * @package    Somnambulist\Collection\Behaviours\Query
 * @subpackage Somnambulist\Collection\Behaviours\Query\CanGetKeys
 *
 * @property array $items
 */
trait CanGetKeys
{

    /**
     * Returns a new collection containing just the keys as values
     *
     * @param mixed $search Get all keys where the value matches
     * @param bool  $strict Strict comparison of values; auto-set to true if an object is the search
     *
     * @return static
     */
    public function keys($search = null, bool $strict = false): self
    {
        if (null === $search) {
            $keys = array_keys($this->items);
        } else {
            $keys = array_keys($this->items, $search, (is_object($search) ? true : $strict));
        }

        return new static($keys);
    }
}
