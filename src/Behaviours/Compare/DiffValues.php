<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Compare;

use Somnambulist\Collection\Utils\Value;
use function array_diff;
use function array_diff_assoc;
use function array_diff_uassoc;
use function array_udiff;

/**
 * Trait DiffValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Compare\DiffValues
 *
 * @property array $items
 */
trait DiffValues
{

    /**
     * Get the items in the collection that are not present in the given items.
     *
     * @link https://www.php.net/array_diff
     *
     * @param mixed $items
     *
     * @return static
     */
    public function diff($items)
    {
        return $this->new(array_diff($this->items, Value::toArray($items)));
    }

    /**
     * Get the items in the collection that are not present in the given items.
     *
     * @link https://www.php.net/array_udiff
     *
     * @param mixed    $items
     * @param callable $callback
     *
     * @return static
     */
    public function diffUsing($items, callable $callback)
    {
        return $this->new(array_udiff($this->items, Value::toArray($items), $callback));
    }

    /**
     * Get the items in the collection whose keys and values are not present in the given items.
     *
     * @link https://www.php.net/array_diff_assoc
     *
     * @param mixed $items
     *
     * @return static
     */
    public function diffAssoc($items)
    {
        return $this->new(array_diff_assoc($this->items, Value::toArray($items)));
    }

    /**
     * Get the items in the collection whose keys and values are not present in the given items.
     *
     * @link https://www.php.net/array_diff_uassoc
     *
     * @param mixed    $items
     * @param callable $callback
     *
     * @return static
     */
    public function diffAssocUsing($items, callable $callback)
    {
        return $this->new(array_diff_uassoc($this->items, Value::toArray($items), $callback));
    }
}
