<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;
use function in_array;
use function preg_match;

/**
 * Trait FilterByKey
 *
 * @package    Somnambulist\Components\Collection\Behaviours\Search
 * @subpackage Somnambulist\Components\Collection\Behaviours\Search\FilterByKey
 *
 * @property array $items
 */
trait FilterByKey
{

    /**
     * Alias of without()
     *
     * @param string ...$ignore
     *
     * @return Collection|static
     */
    public function except(int|string ...$ignore): Collection|static
    {
        return $this->without(...$ignore);
    }

    /**
     * Alias for has(...$key)
     *
     * @param string ...$key
     *
     * @return bool
     */
    public function hasAllOf(int|string ...$key): bool
    {
        return $this->has(...$key);
    }

    /**
     * Returns true if any of the keys are present in the collection
     *
     * @param string ...$key
     *
     * @return bool
     */
    public function hasAnyOf(int|string ...$key): bool
    {
        foreach ($key as $test) {
            if ($this->has($test)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns true if NONE of the keys are present in the collection
     *
     * @param string ...$key
     *
     * @return bool
     */
    public function hasNoneOf(int|string ...$key): bool
    {
        $result = true;

        foreach ($key as $test) {
            $result = $result && !$this->has($test);
        }

        return $result;
    }

    /**
     * Find keys matching the criteria, returning a new collection of the keys
     *
     * @param string|callable $criteria Regular expression or a closure
     *
     * @return Collection|static
     */
    public function keysMatching(string|callable $criteria): Collection|static
    {
        $matches = [];

        if (!Value::isCallable($criteria)) {
            $criteria = fn ($key) => 1 === preg_match($criteria, $key);
        }

        foreach ($this->keys() as $key) {
            if (true === Value::get($criteria, $key)) {
                $matches[] = $key;
            }
        }

        return $this->new($matches);
    }

    /**
     * Alias of with()
     *
     * @param string ...$keys
     *
     * @return Collection|static
     */
    public function only(int|string ...$keys): Collection|static
    {
        return $this->with(...$keys);
    }

    /**
     * Returns a new collection with only the specified keys
     *
     * @param string ...$keys
     *
     * @return Collection|static
     */
    public function with(int|string ...$keys): Collection|static
    {
        return $this->filter(fn ($value, $key) => in_array($key, $keys, true));
    }

    /**
     * Returns a new collection WITHOUT the specified keys
     *
     * @param string ...$keys
     *
     * @return Collection|static
     */
    public function without(int|string ...$keys): Collection|static
    {
        return $this->filter(fn ($value, $key) => !in_array($key, $keys, true));
    }
}
