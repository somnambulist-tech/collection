<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

/**
 * Trait Clearable
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\Clearable
 *
 * @property array $items
 */
trait Clearable
{

    /**
     * Clear all elements from the collection
     *
     * @return static
     */
    public function clear()
    {
        $this->items = [];

        return $this;
    }

    /**
     * Alias of clear
     *
     * @return static
     */
    public function reset()
    {
        return $this->clear();
    }
}
