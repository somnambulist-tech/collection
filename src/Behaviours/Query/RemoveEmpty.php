<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use function in_array;

/**
 * Trait RemoveEmpty
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\RemoveEmpty
 *
 * @property array $items
 */
trait RemoveEmpty
{

    /**
     * Removes values that are matched as empty through an equivalence check
     *
     * @param array $empty Array of values considered to be "empty"
     *
     * @return static
     */
    public function removeEmpty(array $empty = [false, null, ''])
    {
        return $this->filter(fn ($item) => !in_array($item, $empty, true));
    }
}
