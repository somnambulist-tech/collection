<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function shuffle;

/**
 * Trait CanShuffle
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanShuffle
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
    public function shuffle(): self
    {
        $items = $this->items;

        shuffle($items);

        return new static($items);
    }
}
