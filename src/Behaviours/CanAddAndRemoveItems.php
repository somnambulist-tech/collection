<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanAddAndRemoveItems
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanAddAndRemoveItems
 *
 * @property array $items
 */
trait CanAddAndRemoveItems
{

    final public function offsetSet($offset, $value)
    {
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
