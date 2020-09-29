<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface Mappable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Mappable
 */
interface Mappable
{

    /**
     * Collapse the collection of items into a single array
     *
     * @return static
     */
    public function collapse();

    /**
     * @return static
     */
    public function flatten();

    /**
     * @param callable|string $callable
     *
     * @return static
     */
    public function map($callable);

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
    public function reduce(callable $callback, $initial = null);
}
