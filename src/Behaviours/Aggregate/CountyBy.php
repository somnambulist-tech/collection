<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Aggregate;

use function is_null;

/**
 * Trait CountyBy
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Aggregate\CountyBy
 *
 * @property array $items
 */
trait CountyBy
{

    /**
     * Count the number of items in the collection using a given test
     *
     * @param callable|null $callback
     *
     * @return static
     */
    public function countBy($callback = null)
    {
        if (is_null($callback)) {
            $callback = function ($value) {
                return $value;
            };
        }

        return $this->new($this->groupBy($callback)->map(function ($value) {
            return $value->count();
        }));
    }
}
