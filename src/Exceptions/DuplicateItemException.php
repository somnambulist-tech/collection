<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Exceptions;

use DomainException;
use function gettype;
use function sprintf;

/**
 * Class DuplicateItemException
 *
 * @package    Somnambulist\Collection\Exceptions
 * @subpackage Somnambulist\Collection\Exceptions\DuplicateItemException
 */
class DuplicateItemException extends DomainException
{

    public static function found($value, $key): DuplicateItemException
    {
        return new self(sprintf('The set already contains a value with type "%s" at key "%s"', gettype($value), $key));
    }

    public static function preparedValuesContainDuplicates($method): DuplicateItemException
    {
        return new self(sprintf('Duplicate items were found when testing for "%s"', $method));
    }
}
