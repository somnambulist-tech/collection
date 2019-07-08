<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Utils;

use ArrayAccess;
use ArrayObject;
use Iterator;
use Somnambulist\Collection\Contracts\Collection;
use Somnambulist\Collection\MutableCollection;
use stdClass;
use Traversable;
use function array_key_exists;
use function array_merge;
use function is_array;
use function is_null;
use function is_string;
use function iterator_to_array;
use function property_exists;

/**
 * Class Value
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\Value
 */
final class Value
{

    private function __construct()
    {
    }

    /**
     * Provides a callable for fetching data from a collection item
     *
     * Based on Laravel: Illuminate\Support\Collection.valueRetriever
     *
     * @param string|callable $value
     * @param bool            $returnNull If true, returns null instead of the item
     *
     * @return callable
     */
    public static function accessor($value, $returnNull = false): callable
    {
        if (static::isCallable($value)) {
            return $value;
        }

        return function ($item) use ($value, $returnNull) {
            if (is_null($value)) {
                return $returnNull ? null : $item;
            }

            if (Value::isAccessibleByKey($item)) {
                return array_key_exists($value, $item) ? $item[$value] : null;
            }

            if (is_object($item)) {
                if (property_exists($item, $value)) {
                    return $item->{$value};
                }
                if (null !== $method = ClassUtils::getAccessMethodFor($item, $value)) {
                    return $item->{$method}();
                }
            }

            return $returnNull ? null : $item;
        };
    }

    /**
     * Collapse an array of arrays into a single array
     *
     * @param array $value
     *
     * @return array
     */
    public static function collapse($value): array
    {
        $results = [];

        foreach ($value as $values) {
            if ($values instanceof Collection) {
                $values = $values->all();
            } elseif (!is_array($values)) {
                continue;
            }

            $results = array_merge($results, $values);
        }

        return $results;
    }

    /**
     * Converts the value to an array
     *
     * For objects, stdClass, Collection, Iterator and ArrayObject will be converted. If the
     * object has an all, toArray or asArray method, that will be called. Does not cascade
     * into sub-arrays or collections.
     *
     * @param mixed $value
     *
     * @return array
     */
    public static function toArray($value): array
    {
        if (is_null($value)) {
            return [];
        }
        if (is_array($value)) {
            return $value;
        }
        if (is_object($value)) {
            if ($value instanceof stdClass) {
                $value = (array)$value;
            } elseif ($value instanceof Collection) {
                $value = $value->all();
            } elseif ($value instanceof Iterator) {
                $value = iterator_to_array($value);
            } elseif ($value instanceof ArrayObject) {
                $value = $value->getArrayCopy();
            }

            foreach (['all', 'toArray', 'asArray', 'jsonSerialize'] as $method) {
                if (method_exists($value, $method)) {
                    $value = $value->{$method}();
                    break;
                }
            }

            if (!is_array($value)) {
                $value = [$value];
            }

            return $value;
        }

        return [$value];
    }

    /**
     * Attempts to convert the value to nested collection of the specified type
     *
     * Will iterate: arrays, iterators, array objects and convert them to collection
     * instances.
     *
     * @param mixed  $value
     * @param string $type
     *
     * @return Collection
     */
    public static function toCollection($value, $type = MutableCollection::class): Collection
    {
        $items = [];

        foreach ($value as $key => $item) {
            if (is_array($item)) {
                $items[$key] = new $type(static::toCollection($item));
            } elseif ($value instanceof Iterator) {
                $items[$key] = new $type(static::toCollection(iterator_to_array($value)));
            } elseif ($value instanceof ArrayObject) {
                $items[$key] = new $type(static::toCollection($value->getArrayCopy()));
            } else {
                $items[$key] = $value;
            }
        }

        return new $type($items);
    }

    /**
     * Recursively collapses all collections / arrays / values into an array
     *
     * Unlike `collapse()` this will recurse through all elements in the provided value.
     * Keys will be overwritten if they exist in multiple elements.
     *
     * @param array|Collection $value
     * @param bool             $dotKeys Prefix keys with the previous key or not
     * @param string|null      $prefix  Prefix to prepend to keys
     *
     * @return array
     */
    public static function flatten($value, $dotKeys = false, $prefix = null): array
    {
        $return = [];

        foreach ($value as $key => $values) {
            if (is_array($values)) {
                $prefix .= $key . '.';
                $return = array_merge($return, static::flatten($values, $dotKeys, $prefix));
            } elseif ($values instanceof Collection) {
                $prefix .= $key . '.';
                $return = array_merge($return, static::flatten($values->all(), $dotKeys, $prefix));
            } else {
                $return[($dotKeys ? $prefix : '') . $key] = $values;
            }
        }

        return $return;
    }

    /**
     * Return the value or executes the callable to get the value
     *
     * Any arguments specified after the value are passed to the callback
     *
     * @param mixed|callable $value
     * @param mixed          ...$arguments
     *
     * @return mixed
     */
    public static function get($value, ...$arguments)
    {
        return static::isCallable($value) ? $value(...$arguments) : $value;
    }

    /**
     * Returns true if the key exists in the array'ish
     *
     * @param mixed      $array
     * @param string|int $key
     *
     * @return bool
     */
    public static function hasKey($array, $key): bool
    {
        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }

    /**
     * Returns true if value is callable, but not a string callable
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function isCallable($value): bool
    {
        return !is_string($value) && is_callable($value);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isTraversable($value): bool
    {
        return is_array($value) || $value instanceof Traversable;
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isAccessibleByKey($value): bool
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }
}
