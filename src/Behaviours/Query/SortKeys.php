<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function krsort;
use function ksort;

/**
 * Trait SortKeys
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\SortKeys
 *
 * @property array $items
 */
trait SortKeys
{

    /**
     * Sort the Collection by designated keys
     *
     * @link https://www.php.net/ksort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByKey($type = SORT_REGULAR)
    {
        ksort($this->items, $type);

        return $this;
    }

    /**
     * Sort the Collection by designated keys in reverse order
     *
     * @link https://www.php.net/krsort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return static
     */
    public function sortByKeyReversed($type = SORT_REGULAR)
    {
        krsort($this->items, $type);

        return $this;
    }
}
