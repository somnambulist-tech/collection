<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

/**
 * Trait Clear
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\Clear
 *
 * @property array $items
 */
trait Clear
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
