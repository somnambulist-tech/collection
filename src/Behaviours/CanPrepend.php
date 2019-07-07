<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_unshift;

/**
 * Trait CanShift
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanShift
 *
 * @property array $items
 */
trait CanPrepend
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
    public function prepend(...$value): self
    {
        array_unshift($this->items, ...$value);

        return $this;
    }
}
