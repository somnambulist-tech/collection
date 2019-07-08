<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function shuffle;

/**
 * Trait CanShuffle
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanShuffle
 *
 * @property array $items
 */
trait CanShuffle
{

    /**
     * Shuffle the items in the collection.
     *
     * @link https://www.php.net/shuffle
     *
     * @return static
     */
    public function shuffle()
    {
        shuffle($this->items);

        return $this;
    }
}
