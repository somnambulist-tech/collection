<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours;

use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\Exceptions\InvalidItemTypeException;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * @property array $items
 */
trait CannotAddDuplicateItems
{

    final public function offsetSet($offset, $value): void
    {
        Value::assertIsOfType($value, $this->type);

        if ($this->contains($value)) {
            throw DuplicateItemException::found($value, array_search($value, $this->items));
        }

        if (null === $offset) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    final public function offsetUnset($offset): void
    {
        if ($this->offsetExists($offset)) {
            $this->items[$offset] = null;
            unset($this->items[$offset]);
        }
    }

    final public function __set($offset, $value): void
    {
        $this->offsetSet($offset, $value);
    }

    final public function __unset($offset): void
    {
        $this->offsetUnset($offset);
    }
}
