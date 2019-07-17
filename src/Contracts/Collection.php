<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

use ArrayAccess;
use Countable;
use IteratorAggregate;

/**
 * Interface Collection
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Collection
 */
interface Collection extends ArrayAccess, IteratorAggregate, Countable, Arrayable, Jsonable
{

    /**
     * @return array
     */
    public function all(): array;

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function contains($value): bool;

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function doesNotContain($value): bool;

    /**
     * @param callable $callback Receives: ($value, $key)
     *
     * @return static
     */
    public function each(callable $callback);

    /**
     * @param mixed $criteria PHP callable, closure or function
     *
     * @return static
     */
    public function filter($criteria = null);

    /**
     * @return mixed
     */
    public function first();

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param string ...$key
     *
     * @return bool
     */
    public function has(...$key): bool;

    /**
     * @param mixed $search
     *
     * @return static
     */
    public function keys($search = null);

    /**
     * @return mixed
     */
    public function last();

    /**
     * @param callable $callable
     *
     * @return static
     */
    public function map(callable $callable);

    /**
     * @param mixed $items
     *
     * @return static
     */
    public function new($items);

    /**
     * @param string         $key
     * @param mixed|callable $default
     *
     * @return mixed
     */
    public function value($key, $default = null);

    /**
     * @return static
     */
    public function values();

}
