<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * Trait UnionValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\UnionValues
 *
 * @property array $items
 */
trait UnionValues
{

    /**
     * Union the collection with the given items.
     *
     * @param mixed $items
     *
     * @return Collection|static
     */
    public function union(mixed $items): Collection|static
    {
        $this->items = $this->items + Value::toArray($items);

        return $this;
    }
}
