<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Exceptions;

use Exception;
use function get_class;
use function gettype;
use function is_object;
use function sprintf;

class AssertionFailedException extends Exception
{

    private mixed $key;
    private mixed $value;

    public function __construct(mixed $value, int|string $key)
    {
        $this->key   = $key;
        $this->value = $value;

        parent::__construct(
            sprintf(
                'Assertion failed for key "%s" with value type "%s"', $key,
                is_object($value) ? get_class($value) : gettype($value)
            )
        );
    }

    public static function assertionFailedFor(mixed $value, int|string $key): static
    {
        return new self($value, $key);
    }

    public function getKey(): mixed
    {
        return $this->key;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }
}
