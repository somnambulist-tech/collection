<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

/**
 * @property array $items
 */
trait All
{

    /**
     * Returns the underlying collection array
     *
     * @return array
     */
    public function all(): array
    {
        return $this->items;
    }
}
