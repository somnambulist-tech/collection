<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_unshift;

/**
 * Trait PrependValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\PrependValues
 *
 * @property array $items
 */
trait PrependValues
{

    /**
     * Prepends the elements to the beginning of the collection
     *
     * @link https://www.php.net/array_unshift
     *
     * @param mixed ...$value
     *
     * @return static
     */
    public function prepend(...$value)
    {
        array_unshift($this->items, ...$value);

        return $this;
    }
}
