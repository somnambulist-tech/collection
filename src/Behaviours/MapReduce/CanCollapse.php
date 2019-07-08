<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait CanCollapse
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MapReduce\CanCollapse
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
    public function collapse()
    {
        return $this->new(Value::collapse($this->items));
    }
}
