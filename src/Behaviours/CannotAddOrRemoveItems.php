<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use DomainException;
use function sprintf;

/**
 * Trait CannotAddOrRemoveItems
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CannotAddOrRemoveItems
 *
 * @property array $items
 */
trait CannotAddOrRemoveItems
{

    final public function offsetSet($offset, $value)
    {
        throw new DomainException(sprintf('%s is immutable: %s cannot be set', static::class, $offset));
    }

    final public function offsetUnset($offset)
    {
        throw new DomainException(sprintf('%s is immutable: %s cannot be unset', static::class, $offset));
    }

    final public function __set($offset, $value)
    {
        throw new DomainException(sprintf('%s is immutable: %s cannot be set', static::class, $offset));
    }

    final public function __unset($offset)
    {
        throw new DomainException(sprintf('%s is immutable: %s cannot be unset', static::class, $offset));
    }
}
