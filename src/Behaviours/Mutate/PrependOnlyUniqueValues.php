<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Exceptions\DuplicateItemException;
use function array_unshift;

/**
 * Trait PrependOnlyUniqueValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\PrependOnlyUniqueValues
 *
 * @property array $items
 */
trait PrependOnlyUniqueValues
{

    /**
     * Prepends the elements to the beginning of the collection
     *
     * @param mixed ...$value
     *
     * @return static
     */
    public function prepend(...$value)
    {
        foreach ($value as $item) {
            if ($this->contains($item)) {
                throw DuplicateItemException::found($value, $this->keys($item)->first());
            } else {
                array_unshift($this->items, $item);
            }
        }

        return $this;
    }
}