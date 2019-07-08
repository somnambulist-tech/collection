<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Filterable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Filterable
 */
interface Filterable
{

    /**
     * @param mixed $criteria PHP callable, closure or function
     *
     * @return static
     */
    public function filter($criteria = null);

    /**
     * Alias of filter to add but requires the callable
     *
     * @param callable $criteria
     *
     * @return static
     */
    public function matching(callable $criteria);

    /**
     * @param callable $criteria
     *
     * @return static
     */
    public function notMatching(callable $criteria);

    /**
     * @param array $empty
     *
     * @return static
     */
    public function removeEmpty(array $empty = [false, null, '']);

    /**
     * @return static
     */
    public function removeNulls();

    /**
     * @param string ...$key
     *
     * @return bool
     */
    public function hasAnyOf(...$key): bool;

    /**
     * @param string ...$key
     *
     * @return bool
     */
    public function hasNoneOf(...$key): bool;

    /**
     * @param mixed $search
     * @param bool  $strict
     *
     * @return static
     */
    public function keys($search = null, bool $strict = false);

    /**
     * @param string|callable $criteria Regular expression or a closure
     *
     * @return static
     */
    public function keysMatching($criteria);

    /**
     * @param integer $type
     *
     * @return static
     */
    public function unique($type = SORT_STRING);

    /**
     * @param string ...$keys
     *
     * @return static
     */
    public function with(...$keys);

    /**
     * @param string ...$keys
     *
     * @return static
     */
    public function without(...$keys);
}
