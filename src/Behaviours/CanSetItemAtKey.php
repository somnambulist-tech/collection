<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanSetItemAtKey
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanSetItemAtKey
 *
 * @property array $items
 */
trait CanSetItemAtKey
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
