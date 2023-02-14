<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Exceptions;

use DomainException;
use function sprintf;

class CollectionIsFrozenException extends DomainException
{

    public static function cannotSetKeyIn(string $class, $key): self
    {
        return new self(sprintf('%s is immutable: %s cannot be set', $class, $key));
    }

    public static function cannotUnsetKeyIn(string $class, $key): self
    {
        return new self(sprintf('%s is immutable: %s cannot be unset', $class, $key));
    }
}
