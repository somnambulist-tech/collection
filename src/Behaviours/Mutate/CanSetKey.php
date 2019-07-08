<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

/**
 * Trait CanSetKey
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanSetKey
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
    public function set($offset, $value)
    {
        $this->offsetSet($offset, $value);

        return $this;
    }
}