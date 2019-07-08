<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Exceptions\DuplicateItemException;

/**
 * Trait CannotAddDuplicateItems
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CannotAddDuplicateItems
 *
 * @property array $items
 */
trait CannotAddDuplicateItems
{

    final public function offsetSet($offset, $value)
    {
        if ($this->contains($value)) {
            throw DuplicateItemException::found($value, array_search($value, $this->items));
        }

        if (null === $offset) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    final public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            $this->items[$offset] = null;
            unset($this->items[$offset]);
        }
    }

    final public function __set($offset, $value)
    {
        $this->offsetSet($offset, $value);
    }

    final public function __unset($offset)
    {
        $this->offsetUnset($offset);
    }
}
