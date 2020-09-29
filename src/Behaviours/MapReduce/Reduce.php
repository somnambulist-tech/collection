<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\MapReduce;

use function array_reduce;

/**
 * Trait Reduce
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\MapReduce\Reduce
 *
 * @property array $items
 */
trait Reduce
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
    public function reduce(callable $callback, $initial = null)
    {
        return array_reduce($this->items, $callback, $initial);
    }
}
