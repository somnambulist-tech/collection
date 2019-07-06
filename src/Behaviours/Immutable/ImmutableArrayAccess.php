<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Immutable;

use DomainException;

/**
 * Trait ImmutableArrayAccess
 *
 * @package    Somnambulist\Collection\Behaviours\Immutable
 * @subpackage Somnambulist\Collection\Behaviours\Immutable\ImmutableArrayAccess
 */
trait ImmutableArrayAccess
{

    public function offsetSet($offset, $value)
    {
        throw new DomainException(sprintf('%s is immutable: %s cannot be set', static::class, $offset));
    }

    public function offsetUnset($offset)
    {
        throw new DomainException(sprintf('%s is immutable: %s cannot be unset', static::class, $offset));
    }
}
