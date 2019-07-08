<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Exceptions;

use DomainException;
use function sprintf;

/**
 * Class CollectionIsFrozenException
 *
 * @package    Somnambulist\Collection\Exceptions
 * @subpackage Somnambulist\Collection\Exceptions\CollectionIsFrozenException
 */
class CollectionIsFrozenException extends DomainException
{

    public static function cannotSetKeyIn(string $class, $offset): self
    {
        return new self(sprintf('%s is immutable: %s cannot be set', $class, $offset));
    }
}
