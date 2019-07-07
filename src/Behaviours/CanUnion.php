<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait CanUnion
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanUnion
 *
 * @property array $items
 */
trait CanUnion
{

    /**
     * Union the collection with the given items.
     *
     * @param mixed $items
     *
     * @return static
     */
    public function union($items): self
    {
        return new static($this->items + Value::toArray($items));
    }
}
