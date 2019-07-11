<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Utils\Value;
use function array_merge;

/**
 * Trait MergeValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\MergeValues
 *
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
     * @return static
     */
    public function merge($value)
    {
        $this->items = array_merge($this->items, Value::toArray($value));

        return $this;
    }
}
