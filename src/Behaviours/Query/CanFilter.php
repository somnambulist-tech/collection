<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function array_filter;
use function in_array;
use function is_null;

/**
 * Trait CanFilter
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\CanFilter
 *
 * @property array $items
 */
trait CanFilter
{

    /**
     * Filters the collection using the callback
     *
     * The callback receives both the value and the key.
     *
     * @link https://www.php.net/array_filter
     *
     * @param mixed $criteria PHP callable, closure or function
     *
     * @return static
     */
    public function filter($criteria = null)
    {
        return $this->new(array_filter($this->items, $criteria, ARRAY_FILTER_USE_BOTH));
    }

    /**
     * Alias of filter to add but requires the callable
     *
     * @param callable $criteria
     *
     * @return static
     */
    public function matching(callable $criteria)
    {
        return $this->filter($criteria);
    }

    /**
     * Returns items that do NOT pass the test callable
     *
     * The callable is wrapped and checked if it returns false. For example: your callable is a closure
     * that `return Str::contains($value->name(), 'bob');`, then `notMatching` will return all items
     * that do not match that criteria.
     *
     * @param callable $criteria
     *
     * @return static
     */
    public function notMatching(callable $criteria)
    {
        return $this->filter(function ($value, $key) use ($criteria) { return !$criteria($value, $key); });
    }

    /**
     * Alias of notMatching
     *
     * @param callable $criteria
     *
     * @return static
     */
    public function reject(callable $criteria)
    {
        return $this->notMatching($criteria);
    }

    /**
     * Removes values that are matched as empty through an equivalence check
     *
     * @param array $empty Array of values considered to be "empty"
     *
     * @return static
     */
    public function removeEmpty(array $empty = [false, null, ''])
    {
        return $this->filter(function ($item) use ($empty) {
            return !in_array($item, $empty, true);
        });
    }

    /**
     * Removes any null items from the Collection, returning a new collection
     *
     * @return static
     */
    public function removeNulls()
    {
        return $this->filter(function ($item) {
            return !is_null($item);
        });
    }
}
