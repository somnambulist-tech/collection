<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use function sprintf;
use function trigger_error;
use const E_USER_DEPRECATED;

/**
 * Trait SortKeys
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\SortKeys
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
        trigger_error(sprintf('%s is deprecated, use sortBy()', __METHOD__), E_USER_DEPRECATED);

        return $this->sortBy('key', 'asc', $type);
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
        trigger_error(sprintf('%s is deprecated, use sortBy()', __METHOD__), E_USER_DEPRECATED);

        return $this->sortBy('key', 'desc', $type);
    }
}
