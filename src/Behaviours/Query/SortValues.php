<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use function sprintf;
use function trigger_error;
use const E_USER_DEPRECATED;

/**
 * Trait SortValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\SortValues
 *
 * @property array $items
 */
trait SortValues
{

    public function sortUsing($callable)
    {
        trigger_error(sprintf('%s is deprecated, use sort()', __METHOD__), E_USER_DEPRECATED);

        return $this->sort($callable);
    }

    public function sortUsingWithKeys($callable)
    {
        trigger_error(sprintf('%s is deprecated, use sort()', __METHOD__), E_USER_DEPRECATED);

        return $this->sort($callable);
    }

    public function sortByValue($type = SORT_STRING)
    {
        trigger_error(sprintf('%s is deprecated, use sortBy()', __METHOD__), E_USER_DEPRECATED);

        return $this->sortBy('value', 'asc', $type);
    }

    public function sortByValueReversed($type = SORT_STRING)
    {
        trigger_error(sprintf('%s is deprecated, use sortBy()', __METHOD__), E_USER_DEPRECATED);

        return $this->sortBy('value', 'desc', $type);
    }
}
