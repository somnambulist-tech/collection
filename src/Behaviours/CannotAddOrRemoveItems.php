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

    final public function offsetSet($offset, $value)
    {
        throw CollectionIsFrozenException::cannotSetKeyIn(static::class, $offset);
    }

    final public function offsetUnset($offset)
    {
        throw CollectionIsFrozenException::cannotUnsetKeyIn(static::class, $offset);
    }

    final public function __set($offset, $value)
    {
        throw CollectionIsFrozenException::cannotSetKeyIn(static::class, $offset);
    }

    final public function __unset($offset)
    {
        throw CollectionIsFrozenException::cannotUnsetKeyIn(static::class, $offset);
    }
}
