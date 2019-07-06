<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_filter;
use function array_unique;
use function in_array;
use function is_null;

/**
 * Trait CanSearch
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanSearch
 */
trait CanFilter
{

    /**
     * Finds the first item matching the criteria
     *
     * @param callable $criteria
     *
     * @return mixed
     */
    public function find(callable $criteria)
    {
        return $this->filter($criteria)->first();
    }

    /**
     * Finds the last item matching the criteria
     *
     * @param callable $criteria
     *
     * @return mixed
     */
    public function findLast(callable $criteria)
    {
        return $this->filter($criteria)->last();
    }

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
    public function filter($criteria = null): self
    {
        return new static(array_filter($this->items, $criteria, ARRAY_FILTER_USE_BOTH));
    }

    /**
     * Alias of filter to add but requires the callable
     *
     * @param callable $criteria
     *
     * @return static
     */
    public function matching(callable $criteria): self
    {
        return $this->filter($criteria);
    }

    /**
     * Returns items that do NOT pass the test callable
     *
     * The callable is wrapped and checked the return type checked.
     *
     * @param callable $criteria
     *
     * @return static
     */
    public function notMatching(callable $criteria): self
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
    public function reject(callable $criteria): self
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
    public function removeEmpty(array $empty = [false, null, '']): self
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
    public function removeNulls(): self
    {
        return $this->filter(function ($item) {
            return !is_null($item);
        });
    }

    /**
     * Creates a new Collection containing only unique values
     *
     * @link https://www.php.net/array_unique
     *
     * @param null|integer $type Sort flags to use on values
     *
     * @return static
     */
    public function unique($type = null): self
    {
        return new static(array_unique($this->items, $type));
    }
}
