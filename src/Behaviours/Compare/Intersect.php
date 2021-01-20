<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Compare;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;
use function array_intersect;
use function array_intersect_key;

/**
 * Trait Intersect
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Compare\Intersect
 *
 * @property array $items
 */
trait Intersect
{

    /**
     * Intersect the collection with the given items.
     *
     * @link https://www.php.net/array_intersect
     *
     * @param mixed $items
     *
     * @return Collection|static
     */
    public function intersect(mixed $items): Collection|static
    {
        return $this->new(array_intersect($this->items, Value::toArray($items)));
    }

    /**
     * Intersect the collection with the given items by key.
     *
     * @link https://www.php.net/array_intersect_key
     *
     * @param mixed $items
     *
     * @return Collection|static
     */
    public function intersectByKeys(mixed $items): Collection|static
    {
        return $this->new(array_intersect_key($this->items, Value::toArray($items)));
    }
}
