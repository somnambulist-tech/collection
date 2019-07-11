<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

/**
 * Trait All
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\All
 *
 * @property array $items
 */
trait All
{

    /**
     * Returns the underlying collection array
     *
     * @return array
     */
    public function all(): array
    {
        return $this->items;
    }
}
