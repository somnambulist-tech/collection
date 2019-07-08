<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

use function array_combine;
use function array_keys;
use function array_map;

/**
 * Trait CanMap
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MapReduce\CanMap
 *
 * @property array $items
 */
trait CanMap
{

    /**
     * Map a collection and flatten the result by a single level
     *
     * @param callable $callable
     *
     * @return static
     */
    public function flatMap(callable $callable): self
    {
        return $this->map($callable)->collapse();
    }

    /**
     * Apply the callback to all elements in the collection
     *
     * Note: the callable must accept 2 arguments: the value and the key. For single argument
     * functions (e.g. strrev) it must be wrapped in a Closure. For trim and variants that
     * have multiple arguments, again, ensure the function is wrapped in a closure; otherwise
     * the behaviour will be undefined.
     *
     * @link https://www.php.net/array_map
     *
     * @param callable $callable
     *
     * @return static
     */
    public function map(callable $callable): self
    {
        $keys = array_keys($this->items);

        $items = array_map($callable, $this->items, $keys);

        return new static(array_combine($keys, $items));
    }

    /**
     * Map the values into a new class.
     *
     * @param string $class
     *
     * @return static
     */
    public function mapInto(string $class): self
    {
        return $this->map(function ($value, $key) use ($class) {
            return new $class($value, $key);
        });
    }

    /**
     * Alias of map()
     *
     * @param callable $transformer
     *
     * @return static
     */
    public function transform(callable $transformer): self
    {
        trigger_error(__METHOD__ . ' is deprecated, use map() instead', E_USER_DEPRECATED);

        return $this->map($transformer);
    }
}
