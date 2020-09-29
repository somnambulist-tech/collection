<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use function is_null;

/**
 * Trait RemoveNulls
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\RemoveNulls
 *
 * @property array $items
 */
trait RemoveNulls
{

    /**
     * Removes any null items from the Collection, returning a new collection
     *
     * @return static
     */
    public function removeNulls()
    {
        return $this->filter(fn ($item) => !is_null($item));
    }
}
