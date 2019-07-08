<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

/**
 * Trait CanGetAll
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\CanGetAll
 *
 * @property array $items
 */
trait CanGetAll
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
