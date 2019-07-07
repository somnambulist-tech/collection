<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function is_null;

/**
 * Trait CanCountyBy
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanCountyBy
 *
 * @property array $items
 */
trait CanCountyBy
{

    /**
     * Count the number of items in the collection using a given test
     *
     * @param callable|null $callback
     *
     * @return static
     */
    public function countBy($callback = null): self
    {
        if (is_null($callback)) {
            $callback = function ($value) {
                return $value;
            };
        }

        return new static($this->groupBy($callback)->map(function ($value) {
            return $value->count();
        }));
    }
}
