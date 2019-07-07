<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_values;

/**
 * Trait CanGetValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanGetValues
 *
 * @property array $items
 */
trait CanGetValues
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
