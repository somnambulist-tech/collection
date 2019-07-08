<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait CanUnion
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanUnion
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
        $this->items = $this->items + Value::toArray($items);

        return $this;
    }
}
