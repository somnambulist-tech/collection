<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function end;

/**
 * Trait CanGetLast
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\CanGetLast
 *
 * @property array $items
 */
trait CanGetLast
{

    /**
     * Returns the first element of the Collection
     *
     * @return mixed
     */
    public function last()
    {
        return end($this->items);
    }
}
