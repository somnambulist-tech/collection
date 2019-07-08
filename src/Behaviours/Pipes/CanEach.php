<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Pipes;

/**
 * Trait CanEach
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Pipes\CanEach
 *
 * @property array $items
 */
trait CanEach
{

    /**
     * Execute a callback over the collection, halting if the callback returns false
     *
     * @param callable $callback Receives: ($value, $key)
     *
     * @return static
     */
    public function each(callable $callback): self
    {
        foreach ($this->items as $key => $value) {
            if (false === $callback($value, $key)) {
                break;
            }
        }

        return $this;
    }
}
