<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * Trait UnsetKey
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\UnsetKey
 */
trait UnsetKey
{

    /**
     * Remove the key from the collection
     *
     * @param int|string $key
     *
     * @return Collection|static
     */
    public function unset(int|string $key): Collection|static
    {
        $this->offsetUnset($key);

        return $this;
    }
}
