<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

use function array_combine;
use function array_keys;
use function array_map;

/**
 * Trait Map
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MapReduce\Map
 *
 * @property array $items
 */
trait Map
{

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
    public function map(callable $callable)
    {
        $keys = array_keys($this->items);

        $items = array_map($callable, $this->items, $keys);

        return $this->new(array_combine($keys, $items));
    }

    /**
     * Alias of map()
     *
     * @param callable $transformer
     *
     * @return static
     */
    public function transform(callable $transformer)
    {
        trigger_error(__METHOD__ . ' is deprecated, use map() instead', E_USER_DEPRECATED);

        return $this->map($transformer);
    }
}
