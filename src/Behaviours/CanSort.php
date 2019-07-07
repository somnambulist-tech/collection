<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function arsort;
use function asort;
use function krsort;
use function ksort;
use function uasort;
use function usort;

/**
 * Trait CanSort
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanSort
 *
 * @property array $items
 */
trait CanSort
{

    /**
     * Sort the Collection by a user defined function
     *
     * @link http://ca.php.net/usort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return static
     */
    public function sortUsing($callable): self
    {
        usort($this->items, $callable);

        return $this;
    }

    /**
     * Sort the Collection by a user defined function
     *
     * @link http://ca.php.net/uasort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return static
     */
    public function sortUsingWithKeys($callable): self
    {
        uasort($this->items, $callable);

        return $this;
    }

    /**
     * Sorts the Collection by value using asort preserving keys, returns the Collection
     *
     * @link http://ca.php.net/asort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByValue($type = SORT_STRING): self
    {
        asort($this->items, $type);

        return $this;
    }

    /**
     * Sorts the Collection by value using arsort preserving keys, returns the Collection
     *
     * @link http://ca.php.net/arsort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByValueReversed($type = SORT_STRING): self
    {
        arsort($this->items, $type);

        return $this;
    }

    /**
     * Sort the Collection by designated keys
     *
     * @link http://ca.php.net/ksort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByKey($type = null): self
    {
        ksort($this->items, $type);

        return $this;
    }

    /**
     * Sort the Collection by designated keys in reverse order
     *
     * @link http://ca.php.net/krsort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByKeyReversed($type = null): self
    {
        krsort($this->items, $type);

        return $this;
    }
}
