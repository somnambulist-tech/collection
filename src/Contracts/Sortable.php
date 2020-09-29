<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

use const SORT_STRING;

/**
 * Interface Sortable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Sortable
 */
interface Sortable
{

    /**
     * Sort the Collection by a user defined function
     *
     * @link https://www.php.net/uasort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return static
     */
    public function sort($callable);

    /**
     * @param string $type Either values or keys, default values
     * @param string $dir  Either asc or desc, default asc
     * @param int    $comparison One of the SORT_ constants, default being SORT_STRING
     *
     * @return static
     */
    public function sortBy(string $type, string $dir = 'asc', int $comparison = SORT_STRING);

    /**
     * @deprecated Use sort(), deprecated in 4.0; will be removed in 5.0
     */
    public function sortUsing($callable);

    /**
     * @deprecated Use sort(), deprecated in 4.0; will be removed in 5.0
     */
    public function sortUsingWithKeys($callable);

    /**
     * @deprecated Use sortBy('value'), will be removed in 5.0
     */
    public function sortByValue($type = SORT_STRING);

    /**
     * @deprecated Use sortBy('value', 'desc'), will be removed in 5.0
     */
    public function sortByValueReversed($type = SORT_STRING);

    /**
     * @deprecated Use sortBy('key'), will be removed in 5.0
     */
    public function sortByKey($type = null);

    /**
     * @deprecated Use sortBy('key', 'desc'), will be removed in 5.0
     */
    public function sortByKeyReversed($type = null);
}
