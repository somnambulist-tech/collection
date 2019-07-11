<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Mutable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Mutable
 */
interface Mutable extends Collection
{

    /**
     * @param $value
     *
     * @return static
     */
    public function add($value);

    /**
     * @param mixed ...$value One or values to add
     *
     * @return static
     */
    public function append(...$value);

    /**
     * @return static
     */
    public function clear();

    /**
     * @param iterable $items
     *
     * @return static
     */
    public function concat(iterable $items);

    /**
     * @param mixed $value The value to merge into this collection
     *
     * @return static
     */
    public function merge($value);

    /**
     * @param mixed ...$value
     *
     * @return static
     */
    public function prepend(...$value);

    /**
     * @param mixed ...$value
     *
     * @return static
     */
    public function push(...$value);

    /**
     * @param string $value
     *
     * @return static
     */
    public function remove($value);

    /**
     * @param string $offset
     * @param mixed  $value
     *
     * @return static
     */
    public function set($offset, $value);

    /**
     * @return static
     */
    public function shift();

    /**
     * @param mixed $items
     *
     * @return static
     */
    public function union($items);

    /**
     * @param string $offset
     *
     * @return static
     */
    public function unset($offset);

}
