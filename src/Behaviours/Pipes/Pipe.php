<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Pipes;

/**
 * Trait Pipe
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Pipes\Pipe
 *
 * @property array $items
 */
trait Pipe
{

    /**
     * Pass the collection to the given callback and return the result
     *
     * @param callable $callback
     *
     * @return mixed
     */
    public function pipe(callable $callback)
    {
        return $callback($this);
    }
}
