<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait GetAll
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\GetAll
 */
trait GetAll
{

    /**
     * Returns the underlying collection array
     *
     * @return array
     */
    public function all(): array
    {
        return new $this->items;
    }
}
