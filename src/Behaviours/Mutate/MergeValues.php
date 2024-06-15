<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;
use function array_merge;

/**
 * @property array $items
 */
trait MergeValues
{

    /**
     * Merges the supplied array into the current Collection
     *
     * Note: should only be used with Collections of the same data, may cause strange results otherwise.
     * This method will re-index keys and overwrite existing values. If you wish to
     * preserve keys and values see {@link append}.
     *
     * @link https://www.php.net/array_merge
     *
     * @param mixed $value The value to merge into this collection
     *
     * @return Collection|static
     */
    public function merge(mixed $value): Collection|static
    {
        $value = Value::toArray($value);

        Value::assertAllOfType($value, $this->type);

        $this->items = array_merge($this->items, $value);

        return $this;
    }
}
