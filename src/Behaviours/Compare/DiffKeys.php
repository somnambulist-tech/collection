<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Compare;

use Somnambulist\Components\Collection\Utils\Value;
use function array_diff_key;
use function array_diff_ukey;

/**
 * Trait DiffKeys
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Compare\DiffKeys
 *
 * @property array $items
 */
trait DiffKeys
{

    /**
     * Get the items in the collection whose keys are not present in the given items.
     *
     * @link https://www.php.net/array_diff_key
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
     * @link https://www.php.net/array_diff_ukey
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
