<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

use function array_reduce;

/**
 * Trait CanReduce
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MapReduce\CanReduce
 *
 * @property array $items
 */
trait CanReduce
{

    /**
     * Reduces the Collection to a single value, returning it, or $initial if no value
     *
     * @link https://www.php.net/array_reduce
     *
     * @param callable $callback Receives mixed $carry, mixed $value
     * @param mixed    $initial  (optional) Default value to return if no result
     *
     * @return mixed
     */
    public function reduce($callback, $initial = null)
    {
        return array_reduce($this->items, $callback, $initial);
    }
}
