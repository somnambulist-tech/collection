<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use OutOfBoundsException;
use function array_search;
use function end;
use function is_array;

/**
 * Trait Last
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\Last
 *
 * @property array $items
 */
trait Last
{

    /**
     * Returns the last element of the Collection or null if empty
     *
     * @return mixed
     */
    public function last(): mixed
    {
        $value = end($this->items) ?: null;

        if (self::isArrayWrappingEnabled() && is_array($value)) {
            $value = $this->items[array_search($value, $this->items)] = $this->new($value);
        }

        return $value;
    }

    /**
     * Returns the last element or fails with an exception
     *
     * @return mixed
     * @throws OutOfBoundsException
     */
    public function lastOrFail(): mixed
    {
        return $this->last() ?? throw new OutOfBoundsException('No last element found in collection');
    }
}
