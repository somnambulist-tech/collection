<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function reset;

/**
 * Trait First
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\First
 *
 * @property array $items
 */
trait First
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
