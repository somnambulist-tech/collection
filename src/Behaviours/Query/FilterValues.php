<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\KeyWalker;
use function array_filter;
use function preg_match;

/**
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
     * @return Collection|static
     */
    public function filter(string|callable $criteria = null, mixed $test = null): Collection|static
    {
        if ($criteria && $test) {
            $criteria = fn ($value, $key) => KeyWalker::get($value, $criteria) === $test;
        }

        return $this->new(array_filter($this->items, $criteria, ARRAY_FILTER_USE_BOTH));
    }

    /**
     * Returns a new collection containing all values whose keys match the regex rule
     *
     * @param string $rule
     *
     * @return Collection|$this
     */
    public function matchingRule(string $rule): Collection|static
    {
        return $this->filter(fn ($value, $key) => 1 === preg_match($rule, $key));
    }

    /**
     * Alias of filter but requires the callable
     *
     * @param callable $criteria
     *
     * @return Collection|static
     */
    public function matching(callable $criteria): Collection|static
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
     * @return Collection|static
     */
    public function notMatching(callable $criteria): Collection|static
    {
        return $this->filter(fn ($value, $key) => !$criteria($value, $key));
    }

    /**
     * Alias of notMatching
     *
     * @param callable $criteria
     *
     * @return Collection|static
     */
    public function reject(callable $criteria): Collection|static
    {
        return $this->notMatching($criteria);
    }
}
