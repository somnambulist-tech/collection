<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function array_filter;

/**
 * Trait FilterValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\FilterValues
 *
 * @property array $items
 */
trait FilterValues
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
     * Alias of filter but requires the callable
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
}
