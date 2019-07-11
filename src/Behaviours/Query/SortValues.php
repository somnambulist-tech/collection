<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function arsort;
use function asort;
use function uasort;
use function usort;

/**
 * Trait SortValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\SortValues
 *
 * @property array $items
 */
trait SortValues
{

    /**
     * Sort the Collection by a user defined function
     *
     * @link https://www.php.net/usort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return static
     */
    public function sortUsing($callable)
    {
        usort($this->items, $callable);

        return $this;
    }

    /**
     * Sort the Collection by a user defined function
     *
     * @link https://www.php.net/uasort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return static
     */
    public function sortUsingWithKeys($callable)
    {
        uasort($this->items, $callable);

        return $this;
    }

    /**
     * Sorts the Collection by value using asort preserving keys, returns the Collection
     *
     * @link https://www.php.net/asort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByValue($type = SORT_STRING)
    {
        asort($this->items, $type);

        return $this;
    }

    /**
     * Sorts the Collection by value using arsort preserving keys, returns the Collection
     *
     * @link https://www.php.net/arsort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByValueReversed($type = SORT_STRING)
    {
        arsort($this->items, $type);

        return $this;
    }
}
