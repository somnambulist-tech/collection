<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Collection\Utils\Value;

/**
 * Trait CanMergeSet
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanMergeSet
 *
 * @property array $items
 */
trait CanMergeSet
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
        $values = Value::toArray($value);
        $unique = array_unique($values);

        if (count($values) !== count($unique)) {
            throw DuplicateItemException::preparedValuesContainDuplicates(__FUNCTION__);
        }

        foreach ($values as $key => $value) {
            $this->offsetSet((is_numeric($key) ? null : $key), $value);
        }

        return $this;
    }
}
