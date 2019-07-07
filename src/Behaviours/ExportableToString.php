<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Closure;
use Somnambulist\Collection\Utils\Value;
use function http_build_query;
use function implode;
use function sprintf;

/**
 * Trait ExportableToString
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\ExportableToString
 *
 * @property array $items
 */
trait ExportableToString
{

    /**
     * Implodes all the values into a single string, objects should support __toString
     *
     * If a specific value is specified it will be pulled from any sub-arrays or
     * objects; alternatively it can be a closure to fetch specific properties from
     * any objects in the collection.
     *
     * If $withKeys is set to a string, it will prefix the string value with the key
     * and the $withKeys string.
     *
     * @param null|string|Closure $value
     * @param null|string         $glue
     * @param null|string         $withKeys
     *
     * @return string
     */
    public function implode($value = null, $glue = ',', $withKeys = null): string
    {
        $elements = [];

        $accessor = Value::accessor($value);

        foreach ($this->items as $key => $value) {
            $value = $accessor($value);

            if (null !== $withKeys) {
                $elements[] = sprintf('%s%s%s', $key, $withKeys, $value);
            } else {
                $elements[] = (string)$value;
            }
        }

        return implode($glue, $elements);
    }

    /**
     * Returns a HTTP query string of the values
     *
     * Note: should only be used with elements that can be cast to scalars.
     *
     * @param string $separator
     * @param int    $encoding
     *
     * @return string
     */
    public function toQueryString($separator = '&', $encoding = PHP_QUERY_RFC3986): string
    {
        return http_build_query($this->toArray(), null, $separator, $encoding);
    }

    /**
     * Converts the collection to a JSON string
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->toJson();
    }
}
