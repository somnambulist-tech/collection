<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Contracts\Collection;
use function in_array;

/**
 * @property array $items
 */
trait RemoveEmpty
{

    /**
     * Removes values that are matched as empty through an equivalence check
     *
     * @param array $empty Array of values considered to be "empty"
     *
     * @return Collection|static
     */
    public function removeEmpty(array $empty = [false, null, '']): Collection|static
    {
        return $this->filter(fn ($item) => !in_array($item, $empty, true));
    }
}
