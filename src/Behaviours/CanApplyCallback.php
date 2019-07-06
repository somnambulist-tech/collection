<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanApplyCallback
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanApplyCallback
 */
trait CanApplyCallback
{

    /**
     * Execute a callback over the collection
     *
     * @param callable $callback Receives: ($value, $key)
     *
     * @return static
     */
    public function each(callable $callback): self
    {
        foreach ($this->items as $key => $value) {
            if ($callback($value, $key) === false) {
                break;
            }
        }

        return $this;
    }
}
