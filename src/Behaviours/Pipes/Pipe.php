<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Pipes;

/**
 * Trait Pipe
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Pipes\Pipe
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
    public function pipe(callable $callback): mixed
    {
        return $callback($this);
    }
}
