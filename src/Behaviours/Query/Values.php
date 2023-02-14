<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_values;

/**
 * @property array $items
 */
trait Values
{

    /**
     * Returns a new collection containing just the values without the previous keys
     *
     * @return Collection|static
     */
    public function values(): Collection|static
    {
        return $this->new(array_values($this->items));
    }
}
