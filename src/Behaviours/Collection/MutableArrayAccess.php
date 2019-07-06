<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Collection;

/**
 * Trait MutableArrayAccess
 *
 * @package    Somnambulist\Collection\Behaviours\Collection
 * @subpackage Somnambulist\Collection\Behaviours\Collection\MutableArrayAccess
 */
trait MutableArrayAccess
{

    public function offsetSet($offset, $value)
    {
        if (null === $offset) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        $this->items[$offset] = null;
        unset($this->items[$offset]);
    }
}
