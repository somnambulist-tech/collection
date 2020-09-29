<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

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
     * @param mixed ...$ignore
     *
     * @return static
     */
    public function except(...$ignore)
    {
        return $this->without(...$ignore);
    }

    /**
     * Returns true if any of the keys are present in the collection
     *
     * @param string ...$key
     *
     * @return bool
     */
    public function hasAnyOf(...$key): bool
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
    public function hasNoneOf(...$key): bool
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
     * @return static
     */
    public function keysMatching($criteria)
    {
        $matches = [];

        if (!Value::isCallable($criteria)) {
            $criteria = function ($key) use ($criteria) {
                return 1 === preg_match($criteria, $key);
            };
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
     * @param mixed ...$keys
     *
     * @return static
     */
    public function only(...$keys)
    {
        return $this->with(...$keys);
    }

    /**
     * Returns a new collection with only the specified keys
     *
     * @param string ...$keys
     *
     * @return static
     */
    public function with(...$keys)
    {
        return $this->filter(function ($value, $key) use ($keys) {
            return in_array($key, $keys, true);
        });
    }

    /**
     * Returns a new collection WITHOUT the specified keys
     *
     * @param string ...$keys
     *
     * @return static
     */
    public function without(...$keys)
    {
        return $this->filter(function ($value, $key) use ($keys) {
            return !in_array($key, $keys, true);
        });
    }
}
