<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function array_keys;

/**
 * Trait Keys
 *
 * @package    Somnambulist\Collection\Behaviours\Query
 * @subpackage Somnambulist\Collection\Behaviours\Query\Keys
 *
 * @property array $items
 */
trait Keys
{

    /**
     * Returns a new collection containing just the keys as values
     *
     * If a value is provided, then all keys with this value will be returned. Searching
     * is always by strict match.
     *
     * @link https://www.php.net/array_keys
     *
     * @param mixed $value Get all keys where the value matches
     *
     * @return static
     */
    public function keys($value = null)
    {
        if (null === $value) {
            return $this->new(array_keys($this->items));
        }

        return $this->new(array_keys($this->items, $value, true));
    }
}
