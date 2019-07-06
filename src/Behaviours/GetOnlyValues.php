<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_values;

/**
 * Trait GetOnlyValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\GetOnlyValues
 */
trait GetOnlyValues
{

    /**
     * Returns a new collection containing just the values without the previous keys
     *
     * @return static
     */
    public function values(): self
    {
        return new static(array_values($this->items));
    }
}
