<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Compare;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;
use function array_diff;
use function array_diff_assoc;
use function array_diff_uassoc;
use function array_udiff;

/**
 * Trait DiffValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Compare\DiffValues
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
     * @return Collection|static
     */
    public function diff(mixed $items): Collection|static
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
     * @return Collection|static
     */
    public function diffUsing(mixed $items, callable $callback): Collection|static
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
     * @return Collection|static
     */
    public function diffAssoc(mixed $items): Collection|static
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
     * @return Collection|static
     */
    public function diffAssocUsing(mixed $items, callable $callback): Collection|static
    {
        return $this->new(array_diff_uassoc($this->items, Value::toArray($items), $callback));
    }
}
