<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Utils\KeyWalker;
use function array_filter;

/**
 * Trait FilterValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\FilterValues
 *
 * @property array $items
 */
trait FilterValues
{

    /**
     * Filters the collection using the callback
     *
     * The callback receives both the value and the key. If a key name and value are given,
     * will filter all items at that key with the value provided. Key can be an object method,
     * property or array key.
     *
     * @link https://www.php.net/array_filter
     *
     * @param mixed $criteria PHP callable, closure or function, or property name to filter on
     * @param mixed $test The value to filter for
     *
     * @return static
     */
    public function filter($criteria = null, $test = null)
    {
        if ($criteria && $test) {
            $criteria = function ($value, $key) use ($criteria, $test) {
                return KeyWalker::get($value, $criteria) === $test;
            };
        }

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
        return $this->filter(fn ($value, $key) => !$criteria($value, $key));
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
