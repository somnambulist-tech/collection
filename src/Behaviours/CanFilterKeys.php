<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Utils\Value;

use function array_keys;
use function in_array;
use function is_object;
use function preg_match;

/**
 * Trait CanFilterKeys
 *
 * @package    Somnambulist\Collection\Behaviours\Search
 * @subpackage Somnambulist\Collection\Behaviours\Search\CanFilterKeys
 *
 * @property array $items
 */
trait CanFilterKeys
{

    /**
     * Alias of without()
     *
     * @param mixed ...$ignore
     *
     * @return static
     */
    public function except(...$ignore): self
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

    /**
     * Find keys matching the criteria, returning a new collection of the keys
     *
     * @param string|callable $criteria Regular expression or a closure
     *
     * @return static
     */
    public function keysMatching($criteria): self
    {
        $matches = [];

        if (!Value::isCallable($criteria)) {
            $criteria = function ($key) use ($criteria) {
                return false !== preg_match($criteria, $key);
            };
        }

        foreach ($this->keys() as $key) {
            if (true === Value::get($criteria, $key)) {
                $matches[] = $key;
            }
        }

        return new static($matches);
    }

    /**
     * Alias of with()
     *
     * @param mixed ...$keys
     *
     * @return static
     */
    public function only(...$keys): self
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
    public function with(...$keys): self
    {
        $matches = [];

        foreach ($keys as $key) {
            if ($this->has($key)) {
                $matches[$key] = $this->get($key);
            }
        }

        return new static($matches);
    }

    /**
     * Returns a new collection WITHOUT the specified keys
     *
     * @param string ...$keys
     *
     * @return static
     */
    public function without(...$keys): self
    {
        $matches = [];

        foreach ($this->items as $key => $value) {
            if (!in_array($key, $keys)) {
                $matches[$key] = $value;
            }
        }

        return new static($matches);
    }
}
