<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\Utils\Value;

/**
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
     * @return Collection|static
     */
    public function merge(mixed $value): Collection|static
    {
        $items  = Value::toArray($value);
        $unique = array_unique($items);

        Value::assertAllOfType($items, $this->type);

        if (count($items) !== count($unique)) {
            throw DuplicateItemException::preparedValuesContainDuplicates(__FUNCTION__);
        }

        foreach ($items as $key => $value) {
            $this->offsetSet((is_numeric($key) ? null : $key), $value);
        }

        return $this;
    }
}
