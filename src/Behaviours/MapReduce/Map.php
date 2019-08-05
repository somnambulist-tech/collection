<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

use Somnambulist\Collection\Utils\Value;
use function array_combine;
use function array_keys;
use function array_map;
use function trigger_error;

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
     * Note: the callable should accept 2 arguments, the value and the key. For single
     * argument callables only the value will be passed in. The argument count of the
     * callable will attempt to be found. This works on methods, functions and static
     * callable (Class::method).
     *
     * @link https://www.php.net/array_map
     * @link https://github.com/laravel/framework/blob/5.8/src/Illuminate/Support/Collection.php#L1116
     *
     * @param callable $callable
     *
     * @return static
     */
    public function map(callable $callable)
    {
        if (1 === Value::getArgumentCountForCallable($callable)) {
            $callable = function ($value, $key) use ($callable) {
                return $callable($value);
            };
        }

        $keys  = array_keys($this->items);
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
