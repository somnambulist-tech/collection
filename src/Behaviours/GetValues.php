<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_values;

/**
 * Trait GetValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\GetValues
 *
 * @property array $items
 */
trait GetValues
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
