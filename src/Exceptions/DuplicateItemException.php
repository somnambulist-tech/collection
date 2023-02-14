<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Exceptions;

use DomainException;
use function get_class;
use function gettype;
use function is_object;
use function sprintf;

class DuplicateItemException extends DomainException
{

    public static function found($value, $key): DuplicateItemException
    {
        return new self(
            sprintf('The set already contains a value with type "%s" at key "%s"',
                is_object($value) ? get_class($value) : gettype($value), $key
            )
        );
    }

    public static function preparedValuesContainDuplicates($method): DuplicateItemException
    {
        return new self(sprintf('Duplicate items were found when testing for "%s"', $method));
    }
}
