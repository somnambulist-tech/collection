<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use function array_unshift;

/**
 * @property array $items
 */
trait PrependOnlyUniqueValues
{

    /**
     * Prepends the elements to the beginning of the collection
     *
     * @link https://www.php.net/array_unshift
     *
     * @param mixed ...$value
     *
     * @return Collection|static
     */
    public function prepend(mixed ...$value): Collection|static
    {
        foreach ($value as $item) {
            if ($this->contains($item)) {
                throw DuplicateItemException::found($value, $this->keys($item)->first());
            }

            array_unshift($this->items, $item);
        }

        return $this;
    }
}
