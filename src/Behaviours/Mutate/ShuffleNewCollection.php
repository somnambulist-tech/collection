<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function shuffle;

/**
 * Trait ShuffleNewCollection
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\ShuffleNewCollection
 *
 * @property array $items
 */
trait ShuffleNewCollection
{

    /**
     * Shuffle the items in the collection; returning a new collection.
     *
     * @link https://www.php.net/shuffle
     *
     * @return static
     */
    public function shuffle()
    {
        $items = $this->items;

        shuffle($items);

        return $this->new($this);
    }
}
