<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use JsonSerializable;
use Somnambulist\Collection\Contracts\Arrayable;
use stdClass;
use function json_decode;
use function method_exists;

/**
 * Trait ExportableToArray
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\ExportableToArray
 *
 * @property array $items
 */
trait ExportableToArray
{

    /**
     * Convert the collection and any nested data to an array
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];

        foreach ($this->items as $key => $value) {
            if ($value instanceof Arrayable) {
                $array[$key] = $value->toArray();
            } elseif ($value instanceof JsonSerializable) {
                $array[$key] = $value->jsonSerialize();
            } elseif ($value instanceof stdClass) {
                $array[$key] = (array)$value;
            } elseif (method_exists($value, 'toArray')) {
                $array[$key] = $value->toArray();
            } elseif (method_exists($value, 'toJson')) {
                $array[$key] = json_decode($value->toJson(), true);
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    }
}
