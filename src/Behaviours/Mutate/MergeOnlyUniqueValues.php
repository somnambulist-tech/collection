<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Collection\Utils\Value;

/**
 * Trait MergeOnlyUniqueValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\MergeOnlyUniqueValues
 *
 * @property array $items
 */
trait MergeOnlyUniqueValues
{

    /**
     * Merges the supplied array into the current Collection
     *
     * Note: should only be used with Collections of the same data, may cause strange results otherwise.
     * This method will re-index keys and overwrite existing values. If you wish to
     * preserve keys and values see {@link append}.
     *
     * @param mixed $value The value to merge into this collection
     *
     * @return static
     */
    public function merge($value)
    {
        $items  = Value::toArray($value);
        $unique = array_unique($items);

        if (count($items) !== count($unique)) {
            throw DuplicateItemException::preparedValuesContainDuplicates(__FUNCTION__);
        }

        foreach ($items as $key => $value) {
            $this->offsetSet((is_numeric($key) ? null : $key), $value);
        }

        return $this;
    }
}
