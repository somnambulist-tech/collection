<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * @property array $items
 */
trait Clear
{

    /**
     * Clear all elements from the collection
     *
     * @return Collection|static
     */
    public function clear(): Collection|static
    {
        $this->items = [];

        return $this;
    }

    /**
     * Alias of clear
     *
     * @return Collection|static
     */
    public function reset(): Collection|static
    {
        return $this->clear();
    }
}
