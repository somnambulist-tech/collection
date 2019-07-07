<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Contracts\ImmutableCollection;
use Somnambulist\Collection\FrozenCollection;

/**
 * Trait Freezeable
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Freezeable
 *
 * @property array $items
 */
trait Freezeable
{

    public function freeze(): ImmutableCollection
    {
        return new FrozenCollection($this->items);
    }
}
