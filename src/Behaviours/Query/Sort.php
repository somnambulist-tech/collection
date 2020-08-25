<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use Somnambulist\Collection\Utils\KeyWalker;
use function is_callable;
use function uasort;
use const SORT_STRING;

/**
 * Trait Sort
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\Sort
 *
 * @property array $items
 */
trait Sort
{

    /**
     * Sort the Collection by a user defined function, preserves key association
     *
     * @link https://www.php.net/uasort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return static
     */
    public function sort($callable)
    {
        if (!is_callable($callable)) {
            $callable = function ($a, $b) use ($callable) {
                return KeyWalker::get($a, $callable) <=> KeyWalker::get($b, $callable);
            };
        }

        uasort($this->items, $callable);

        return $this;
    }

    /**
     * Sort the collection by `value` or `key` ordered `asc` (A-Z) or `desc` (Z-A)
     *
     * @link https://www.php.net/asort
     * @link https://www.php.net/arsort
     * @link https://www.php.net/ksort
     * @link https://www.php.net/krsort
     *
     * @param string $type Either values or keys, default values
     * @param string $dir  Either asc or desc, default asc
     * @param int    $comparison One of the SORT_ constants, default being SORT_STRING
     *
     * @return static
     */
    public function sortBy(string $type, string $dir = 'asc', int $comparison = SORT_STRING)
    {
        $fn = $type === 'key' && $dir === 'desc' ? 'krsort' : ($type === 'key' ? 'ksort' : ($dir === 'desc' ? 'arsort' : 'asort'));

        $fn($this->items, $comparison);

        return $this;
    }
}