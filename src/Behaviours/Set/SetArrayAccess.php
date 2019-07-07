<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Set;

use DomainException;
use function gettype;
use function sprintf;
/**
 * Trait SetArrayAccess
 *
 * @package    Somnambulist\Collection\Behaviours\Set
 * @subpackage Somnambulist\Collection\Behaviours\Set\SetArrayAccess
 *
 * @property array $items
 */
trait SetArrayAccess
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

    public function offsetUnset($offset)
    {
        $this->items[$offset] = null;
        unset($this->items[$offset]);
    }
}
