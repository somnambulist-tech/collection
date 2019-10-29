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
     * Returns the first element from the collection; or null if empty
     *
     * @return mixed|null
     */
    public function first()
    {
        return reset($this->items) ?: null;
    }
}
