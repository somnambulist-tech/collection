<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Exceptions\CollectionIsFrozenException;

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
        throw CollectionIsFrozenException::cannotSetKeyIn(static::class, $offset);
    }

    final public function offsetUnset($offset)
    {
        throw CollectionIsFrozenException::cannotSetKeyIn(static::class, $offset);
    }

    final public function __set($offset, $value)
    {
        throw CollectionIsFrozenException::cannotSetKeyIn(static::class, $offset);
    }

    final public function __unset($offset)
    {
        throw CollectionIsFrozenException::cannotSetKeyIn(static::class, $offset);
    }
}
