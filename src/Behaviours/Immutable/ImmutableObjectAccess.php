<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Immutable;

use DomainException;
use function sprintf;

/**
 * Trait ImmutableObjectAccess
 *
 * @package    Somnambulist\Collection\Behaviours\Immutable
 * @subpackage Somnambulist\Collection\Behaviours\Immutable\ImmutableObjectAccess
 *
 * @property array $items
 */
trait ImmutableObjectAccess
{

    public function __set($offset, $value)
    {
        throw new DomainException(sprintf('%s is immutable: %s cannot be set', static::class, $offset));
    }

    public function __unset($offset)
    {
        throw new DomainException(sprintf('%s is immutable: %s cannot be unset', static::class, $offset));
    }
}
