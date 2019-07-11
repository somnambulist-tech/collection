<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Sortable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Sortable
 */
interface Sortable
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
    public function sortUsing($callable);

    /**
     * Sort the Collection by a user defined function
     *
     * @link https://www.php.net/uasort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return static
     */
    public function sortUsingWithKeys($callable);

    /**
     * Sorts the Collection by value using asort preserving keys, returns the Collection
     *
     * @link https://www.php.net/asort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByValue($type = SORT_STRING);

    /**
     * Sorts the Collection by value using arsort preserving keys, returns the Collection
     *
     * @link https://www.php.net/arsort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByValueReversed($type = SORT_STRING);

    /**
     * Sort the Collection by designated keys
     *
     * @link https://www.php.net/ksort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByKey($type = null);

    /**
     * Sort the Collection by designated keys in reverse order
     *
     * @link https://www.php.net/krsort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByKeyReversed($type = null);
}
