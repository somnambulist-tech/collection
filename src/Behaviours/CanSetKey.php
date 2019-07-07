<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanSetKey
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanSetKey
 *
 * @property array $items
 */
trait CanSetKey
{

    /**
     * Add the value at the specified offset to the collection
     *
     * @param string $offset
     * @param mixed  $value
     *
     * @return static
     */
    public function set($offset, $value): self
    {
        $this->offsetSet($offset, $value);

        return $this;
    }
}
