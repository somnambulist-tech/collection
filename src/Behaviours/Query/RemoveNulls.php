<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Contracts\Collection;
use function is_null;

/**
 * @property array $items
 */
trait RemoveNulls
{

    /**
     * Removes any null items from the Collection, returning a new collection
     *
     * @return Collection|static
     */
    public function removeNulls(): Collection|static
    {
        return $this->filter(fn ($item) => !is_null($item));
    }
}
