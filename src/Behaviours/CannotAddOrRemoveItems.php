<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours;

use Somnambulist\Components\Collection\Exceptions\CollectionIsFrozenException;

/**
 * Trait CannotAddOrRemoveItems
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\CannotAddOrRemoveItems
 *
 * @property array $items
 */
trait CannotAddOrRemoveItems
{

    final public function offsetSet($offset, $value): void
    {
        throw CollectionIsFrozenException::cannotSetKeyIn(static::class, $offset);
    }

    final public function offsetUnset($offset): void
    {
        throw CollectionIsFrozenException::cannotUnsetKeyIn(static::class, $offset);
    }

    final public function __set($offset, $value): void
    {
        throw CollectionIsFrozenException::cannotSetKeyIn(static::class, $offset);
    }

    final public function __unset($offset): void
    {
        throw CollectionIsFrozenException::cannotUnsetKeyIn(static::class, $offset);
    }
}
