<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function is_null;

/**
 * Trait RemoveNulls
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\RemoveNulls
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
        return $this->filter(function ($item) {
            return !is_null($item);
        });
    }
}
