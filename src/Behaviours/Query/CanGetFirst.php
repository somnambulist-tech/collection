<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function reset;

/**
 * Trait CanGetFirst
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\CanGetFirst
 *
 * @property array $items
 */
trait CanGetFirst
{

    /**
     * Returns the first element from the collection
     *
     * @return mixed
     */
    public function first()
    {
        return reset($this->items);
    }
}
