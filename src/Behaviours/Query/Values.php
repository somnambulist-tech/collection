<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function array_values;

/**
 * Trait Values
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\Values
 *
 * @property array $items
 */
trait Values
{

    /**
     * Returns a new collection containing just the values without the previous keys
     *
     * @return static
     */
    public function values()
    {
        return $this->new(array_values($this->items));
    }
}
