<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * Trait SetKeyValue
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\SetKeyValue
 *
 * @property array $items
 */
trait SetKeyValue
{

    /**
     * Add the value at the specified key/offset to the collection
     *
     * @param int|string $key
     * @param mixed      $value
     *
     * @return Collection|static
     */
    public function set(int|string $key, mixed $value): Collection|static
    {
        $this->offsetSet($key, $value);

        return $this;
    }
}
