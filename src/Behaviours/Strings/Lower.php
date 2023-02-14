<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Strings;

use Somnambulist\Components\Collection\Contracts\Collection;
use function mb_strtolower;
use function strtolower;

/**
 * @property array $items
 */
trait Lower
{

    /**
     * Returns a new collection will all values mapped to lower case
     *
     * @return Collection|static
     */
    public function lower(): Collection|static
    {
        return $this->map(fn ($item) => function_exists('mb_strtolower') ? mb_strtolower($item) : strtolower($item));
    }
}
