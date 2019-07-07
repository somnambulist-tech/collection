<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Set;

use DomainException;
use function gettype;

/**
 * Trait MutableObjectAccess
 *
 * @package    Somnambulist\Collection\Behaviours\Set
 * @subpackage Somnambulist\Collection\Behaviours\Set\MutableObjectAccess
 *
 * @property array $items
 */
trait SetObjectAccess
{

    public function __set($offset, $value)
    {
        if ($this->contains($value)) {
            throw new DomainException(sprintf('The set already contains a value of type "%s"', gettype($value)));
        }

        $this->offsetSet($offset, $value);
    }

    public function __unset($offset)
    {
        $this->offsetUnset($offset);
    }
}
