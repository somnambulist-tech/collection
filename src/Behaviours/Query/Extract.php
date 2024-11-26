<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\KeyWalker;

/**
 * @property array $items
 */
trait Extract
{

    /**
     * Extract the values for all items with an element named $element, optionally indexed by $withKey
     *
     * @param string      $element
     * @param string|null $withKey
     *
     * @return Collection|static
     */
    public function extract(string $element, ?string $withKey = null): Collection|static
    {
        return $this->new(KeyWalker::extract($this, $element, $withKey));
    }
}
