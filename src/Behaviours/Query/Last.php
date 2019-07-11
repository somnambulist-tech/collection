<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function end;

/**
 * Trait Last
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\Last
 *
 * @property array $items
 */
trait Last
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
