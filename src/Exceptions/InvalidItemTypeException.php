<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Exceptions;

use DomainException;
use function get_class;
use function get_debug_type;
use function gettype;
use function is_object;
use function sprintf;

class InvalidItemTypeException extends DomainException
{
    private mixed $value;
    private string $type;

    public static function invalidItem($value, $type): InvalidItemTypeException
    {
        $e = new self(
            sprintf('Values must be of type "%s", "%s" is not permitted',
                $type, get_debug_type($value),
            )
        );
        $e->value = $value;
        $e->type  = $type;

        return $e;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
