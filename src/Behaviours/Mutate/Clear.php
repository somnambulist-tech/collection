<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

/**
 * Trait Clear
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\Clear
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
