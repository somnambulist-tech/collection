<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait CanCollapse
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanCollapse
 *
 * @property array $items
 */
trait CanCollapse
{

    /**
     * Collapse the collection of items into a single array
     *
     * @return static
     */
    public function collapse(): self
    {
        return new static(Value::collapse($this->items));
    }
}
