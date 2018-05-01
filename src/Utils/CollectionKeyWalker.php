<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Somnambulist\Collection\Utils;

use Somnambulist\Collection\Collection;

/**
 * Class CollectionWalker
 *
 * Adds support for walking a Collection (or array) via dot notation.
 * Based on Laravels data_get / Arr::get.
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\CollectionWalker
 */
class CollectionKeyWalker
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
            if (Support::keyExists($collection, mb_substr($key, 1))) {
                return $collection[mb_substr($key, 1)];
            }

            return Support::value($default);
        }

        $key = is_array($key) ? $key : explode('.', $key);

        while (!is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($collection instanceof Collection) {
                    $collection = $collection->all();
                } elseif (!is_array($collection)) {
                    return Support::value($default);
                }

                $result = static::extract($collection, $key, null, $default);

                return in_array('*', $key) ? Support::flatten($result) : $result;
            }

            if (Support::isTraversable($collection) && Support::keyExists($collection, $segment)) {
                $collection = $collection[$segment];
            } elseif (is_object($collection) && isset($collection->{$segment})) {
                $collection = $collection->{$segment};
            } elseif (is_object($collection) && !($collection instanceof Collection) && method_exists($collection, $segment)) {
                $collection = $collection->{$segment}();
            } elseif (is_object($collection) && !($collection instanceof Collection) && method_exists($collection, 'get' . ucwords($segment))) {
                $collection = $collection->{'get' . ucwords($segment)}();
            } else {
                return Support::value($default);
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
    protected static function extractKeyValueParameters($value, $key)
    {
        $value = is_string($value) ? explode('.', $value) : $value;
        $key   = is_null($key) || is_array($key) ? $key : explode('.', $key);

        return [$value, $key];
    }
}
