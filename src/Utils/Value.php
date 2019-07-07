<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Utils;

use ArrayAccess;
use ArrayObject;
use InvalidArgumentException;
use Iterator;
use Somnambulist\Collection\Contracts\Collection;
use stdClass;
use Traversable;
use function array_key_exists;
use function array_merge;
use function gettype;
use function is_array;
use function is_null;
use function is_string;
use function iterator_to_array;
use function property_exists;
use function sprintf;

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
     * Providers a callable for fetching data from a collection item
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
     * object has an all, toArray or asArray method, that will be called. Otherwise, an
     * exception will be raised if conversion fails.
     *
     * @param mixed $value
     *
     * @return array
     */
    public static function convertToArray($value): array
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

            foreach (['all', 'toArray', 'asArray'] as $method) {
                if (method_exists($value, $method)) {
                    $value = $value->{$method}();
                    break;
                }
            }

            if (!is_array($value)) {
                throw new InvalidArgumentException(
                    sprintf('Object of type "%s" could not be converted to an array', gettype($value))
                );
            }

            return $value;
        }

        return [$value];
    }

    /**
     * Recursively collapses all collections / arrays / values into an array
     *
     * Unlike `collapse()` this will recurse through all elements in the provided value.
     * Keys will be overwritten if they exist in multiple elements.
     *
     * @param array|Collection $value
     *
     * @return array
     */
    public static function flatten($value): array
    {
        $return = [];

        foreach ($value as $key => $values) {
            if (is_array($values)) {
                $return = array_merge($return, static::flatten($values));
            } elseif ($values instanceof Collection) {
                $return = array_merge($return, static::flatten($values->all()));
            } else {
                $return[$key] = $values;
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
     * @param mixed  $array
     * @param string $key
     *
     * @return bool
     */
    public static function hasKey($array, string $key): bool
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
