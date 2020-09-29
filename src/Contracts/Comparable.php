<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface Diffable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Diffable
 */
interface Comparable
{

    /**
     * @param mixed $items
     *
     * @return static
     */
    public function diff($items);

    /**
     * @param mixed    $items
     * @param callable $callback
     *
     * @return static
     */
    public function diffUsing($items, callable $callback);

    /**
     * @param mixed $items
     *
     * @return static
     */
    public function diffAssoc($items);

    /**
     * @param mixed    $items
     * @param callable $callback
     *
     * @return static
     */
    public function diffAssocUsing($items, callable $callback);

    /**
     * @param mixed $items
     *
     * @return static
     */
    public function diffKeys($items);

    /**
     * @param mixed    $items
     * @param callable $callback
     *
     * @return static
     */
    public function diffKeysUsing($items, callable $callback);

    /**
     * Intersect the collection with the given items.
     *
     * @param mixed $items
     *
     * @return static
     */
    public function intersect($items);

    /**
     * Intersect the collection with the given items by key.
     *
     * @param mixed $items
     *
     * @return static
     */
    public function intersectByKeys($items);
}
