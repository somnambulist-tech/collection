<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use OutOfBoundsException;
use function array_search;
use function is_array;
use function reset;

/**
 * Trait First
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\First
 *
 * @property array $items
 */
trait First
{

    /**
     * Returns the first element from the collection; or null if empty
     *
     * @return mixed
     */
    public function first(): mixed
    {
        $value = reset($this->items) ?: null;

        if (self::isArrayWrappingEnabled() && is_array($value)) {
            $value = $this->items[array_search($value, $this->items)] = $this->new($value);
        }

        return $value;
    }

    /**
     * Returns the first element, or fails with an exception
     *
     * @return mixed
     * @throws OutOfBoundsException
     */
    public function firstOrFail(): mixed
    {
        return $this->first() ?? throw new OutOfBoundsException('No first element found in collection');
    }
}
