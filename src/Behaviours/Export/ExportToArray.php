<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Export;

use Somnambulist\Components\Collection\Utils\Value;

/**
 * Trait ExportToArray
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Export\ExportToArray
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
