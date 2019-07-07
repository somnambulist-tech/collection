<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use DomainException;
use function gettype;
use function sprintf;

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
            throw new DomainException(sprintf('The set already contains a value of type "%s"', gettype($value)));
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
