<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Compare;

use Somnambulist\Collection\Utils\Value;
use function array_diff_key;
use function array_diff_ukey;

/**
 * Trait DiffKeys
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Compare\DiffKeys
 *
 * @property array $items
 */
trait DiffKeys
{

    /**
     * Get the items in the collection whose keys are not present in the given items.
     *
     * @param mixed $items
     *
     * @return static
     */
    public function diffKeys($items)
    {
        return $this->new(array_diff_key($this->items, Value::toArray($items)));
    }

    /**
     * Get the items in the collection whose keys are not present in the given items.
     *
     * @param mixed    $items
     * @param callable $callback
     *
     * @return static
     */
    public function diffKeysUsing($items, callable $callback)
    {
        return $this->new(array_diff_ukey($this->items, Value::toArray($items), $callback));
    }
}
