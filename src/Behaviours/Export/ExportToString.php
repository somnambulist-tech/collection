<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Export;

use Closure;
use Somnambulist\Components\Collection\Utils\Value;
use function implode;
use function sprintf;

/**
 * Trait ExportToString
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Export\ExportToString
 *
 * @property array $items
 */
trait ExportToString
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
     * @param string              $glue
     * @param null|string|Closure $value
     * @param null|string         $withKeys
     *
     * @return string
     */
    public function implode($glue = ',', $value = null, $withKeys = null): string
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
     * Converts the collection to a JSON string
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->toJson();
    }
}
