<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

/**
 * Trait SetKeyValue
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\SetKeyValue
 *
 * @property array $items
 */
trait SetKeyValue
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
