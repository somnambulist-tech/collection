<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Utils;

use Somnambulist\Components\Collection\Contracts\Collection;
use function is_scalar;
use function method_exists;

/**
 * Class KeyWalker
 *
 * Adds support for walking a Collection (or array) via dot notation.
 * Based on Laravels data_get / Arr::get.
 *
 * @package    Somnambulist\Components\Collection\Utils
 * @subpackage Somnambulist\Components\Collection\Utils\KeyWalker
 */
final class KeyWalker
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
    public static function get($collection, $key, $default = null)
    {
        if (is_null($key)) {
            return $collection;
        }

        if (is_scalar($key) && Value::hasKey($collection, $key)) {
            return $collection[$key];
        }

        $key = is_array($key) ? $key : explode('.', (string)$key);

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

            if (ClassUtils::hasProperty($collection, $segment) || method_exists($collection, $segment)) {
                $collection = ClassUtils::getProperty($collection, $segment);
            } else {
                return Value::get($default);
            }
        }

        return $collection;
    }

    /**
     * Walks the collection checking if a key exists using dot notation
     *
     * @param Collection|array $collection
     * @param string           $key
     *
     * @return array|mixed
     */
    public static function has($collection, $key): bool
    {
        if (is_null($key)) {
            return false;
        }

        if (is_scalar($key) && Value::hasKey($collection, $key)) {
            return true;
        }

        $key = is_array($key) ? $key : explode('.', (string)$key);

        while (!is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($collection instanceof Collection) {
                    $collection = $collection->all();
                } elseif (!is_array($collection)) {
                    return false;
                }

                $result = static::extract($collection, $key, null, '__somnambulist_collection_value_exists_key_not_found');

                foreach ($result as &$value) {
                    $value = !('__somnambulist_collection_value_exists_key_not_found' === $value);
                }

                return count(array_filter($result)) === count($result);
            }

            if (ClassUtils::hasProperty($collection, $segment)) {
                $collection = ClassUtils::getProperty($collection, $segment);
            } else {
                return false;
            }
        }

        return false;
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
            $itemValue = static::get($item, $value, $default);

            if (is_null($key)) {
                $results[] = $itemValue;
            } else {
                $itemKey = (string)static::get($item, $key, $default);

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
        $key   = is_null($key) || is_array($key) ? $key : explode('.', (string)$key);

        return [$value, $key];
    }
}
