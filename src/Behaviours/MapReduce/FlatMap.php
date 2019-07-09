<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

/**
 * Trait FlatMap
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MapReduce\FlatMap
 *
 * @property array $items
 */
trait FlatMap
{

    /**
     * Map a collection and flatten the result by a single level
     *
     * @param callable $callable
     *
     * @return static
     */
    public function flatMap(callable $callable)
    {
        return $this->map($callable)->collapse();
    }
}
