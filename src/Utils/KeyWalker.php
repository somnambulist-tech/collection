<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Utils;

use ArrayAccess;
use Somnambulist\Collection\Contracts\Collection;

/**
 * Class KeyWalker
 *
 * Adds support for walking a Collection (or array) via dot notation.
 * Based on Laravels data_get / Arr::get.
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\KeyWalker
 */
class KeyWalker
{

    /**
     * Walks the collection accessing nested members defined in the key by dot notation
     *
     * @param Collection|array $collection
     * @param string           $key
     * @param null|mixed       $default
     *
     * @return array|mixed
     */
    public static function walk($collection, $key, $default = null)
    {
        if (is_null($key)) {
            return $collection;
        }
        if (is_string($key) && mb_substr($key, 0, 1) == '@') {
            if (static::keyExists($collection, mb_substr($key, 1))) {
                return $collection[mb_substr($key, 1)];
            }

            return Value::get($default);
        }

        $key = is_array($key) ? $key : explode('.', $key);

        while (!is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($collection instanceof Collection) {
                    $collection = $collection->all();
                } elseif (!is_array($collection)) {
                    return Value::get($default);
                }

                $result = static::extract($collection, $key, null, $default);

                return in_array('*', $key) ? Value::flatten($result) : $result;
            }

            if (Value::isTraversable($collection) && static::keyExists($collection, $segment)) {
                $collection = $collection[$segment];
            } elseif (is_object($collection) && isset($collection->{$segment})) {
                $collection = $collection->{$segment};
            } elseif (is_object($collection) && !($collection instanceof Collection) && method_exists($collection, $segment)) {
                $collection = $collection->{$segment}();
            } elseif (is_object($collection) && !($collection instanceof Collection) && method_exists($collection, 'get' . ucwords($segment))) {
                $collection = $collection->{'get' . ucwords($segment)}();
            } else {
                return Value::get($default);
            }
        }

        return $collection;
    }

    /**
     * Extracts values from a Collection, array or set of objects
     *
     * @param array|Collection  $collection
     * @param string|array      $value
     * @param string|array|null $key
     * @param mixed|null        $default
     *
     * @return array
     */
    public static function extract($collection, $value, $key = null, $default = null)
    {
        $results = [];

        [$value, $key] = static::extractKeyValueParameters($value, $key);

        foreach ($collection as $item) {
            $itemValue = static::walk($item, $value, $default);

            if (is_null($key)) {
                $results[] = $itemValue;
            } else {
                $itemKey = static::walk($item, $key, $default);

                $results[$itemKey] = $itemValue;
            }
        }

        return $results;
    }

    /**
     * Normalises the key and value to be used with extract
     *
     * @param string|array      $value
     * @param string|array|null $key
     *
     * @return array
     */
    protected static function extractKeyValueParameters($value, $key): array
    {
        $value = is_string($value) ? explode('.', $value) : $value;
        $key   = is_null($key) || is_array($key) ? $key : explode('.', $key);

        return [$value, $key];
    }

    /**
     * Returns true if the key exists in the array
     *
     * @param mixed  $array
     * @param string $key
     *
     * @return bool
     */
    public static function keyExists($array, $key): bool
    {
        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }
}
