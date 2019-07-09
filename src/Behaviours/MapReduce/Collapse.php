<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait Collapse
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MapReduce\Collapse
 *
 * @property array $items
 */
trait Collapse
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
