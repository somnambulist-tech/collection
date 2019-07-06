<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait Resetable
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Resetable
 */
trait Resetable
{

    /**
     * Alias of reset
     *
     * @return static
     */
    public function clear(): self
    {
        return $this->reset();
    }

    /**
     * Resets the internal array to an empty array
     *
     * @return static
     */
    public function reset(): self
    {
        $this->items = [];

        return $this;
    }
}
