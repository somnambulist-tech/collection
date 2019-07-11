<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Export;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait ExportToArray
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Export\ExportToArray
 *
 * @property array $items
 */
trait ExportToArray
{

    /**
     * Convert the collection and any nested data to an array
     *
     * Note: some objects may fail to convert to arrays if they do not have
     * appropriate export / array methods.
     *
     * @return array
     */
    public function toArray(): array
    {
        $array = [];

        foreach ($this->items as $key => $value) {
            $array[$key] = Value::exportToArray($value);
        }

        return $array;
    }
}
