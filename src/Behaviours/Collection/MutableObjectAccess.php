<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Collection;

/**
 * Trait MutableObjectAccess
 *
 * @package    Somnambulist\Collection\Behaviours\Collection
 * @subpackage Somnambulist\Collection\Behaviours\Collection\MutableObjectAccess
 *
 * @property array $items
 */
trait MutableObjectAccess
{

    public function __set($offset, $value)
    {
        $this->offsetSet($offset, $value);
    }

    public function __unset($offset)
    {
        $this->offsetUnset($offset);
    }
}
