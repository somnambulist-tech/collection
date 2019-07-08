<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Mappable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Mappable
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
     * @param callable $callable
     *
     * @return static
     */
    public function flatMap(callable $callable);

    /**
     * @return static
     */
    public function flatten();

    /**
     * @param callable $callable
     *
     * @return static
     */
    public function map(callable $callable);

    /**
     * @param string $class
     *
     * @return static
     */
    public function mapInto(string $class);

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
    public function reduce($callback, $initial = null);
}
