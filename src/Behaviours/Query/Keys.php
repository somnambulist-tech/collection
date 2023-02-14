<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_keys;

/**
 * @property array $items
 */
trait Keys
{

    /**
     * Returns a new collection containing just the keys as values
     *
     * If a value is provided, then all keys with this value will be returned. Searching
     * is always by strict match.
     *
     * @link https://www.php.net/array_keys
     *
     * @param mixed $value Get all keys where the value matches
     *
     * @return Collection|static
     */
    public function keys(mixed $value = null): Collection|static
    {
        if (null === $value) {
            return $this->new(array_keys($this->items));
        }

        return $this->new(array_keys($this->items, $value, true));
    }
}
