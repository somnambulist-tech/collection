<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\MapReduce;

use Somnambulist\Components\Collection\Utils\Value;
use function array_combine;
use function array_keys;
use function array_map;

/**
 * Trait Map
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\MapReduce\Map
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
     * @param callable|string $callable A callable or string name of a function
     *
     * @return static
     */
    public function map($callable)
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
}
