<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * Trait RemoveValue
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\RemoveValue
 *
 * @property array $items
 */
trait RemoveValue
{

    /**
     * Remove the value from the collection
     *
     * @param mixed $value
     *
     * @return Collection|static
     */
    public function remove(mixed $value): Collection|static
    {
        $this->keys($value)->each(fn ($key) => $this->offsetUnset($key));

        return $this;
    }
}
