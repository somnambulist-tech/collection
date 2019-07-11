<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function shuffle;

/**
 * Trait Shuffle
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\Shuffle
 *
 * @property array $items
 */
trait Shuffle
{

    /**
     * Shuffle the items in the collection; does NOT return a new collection.
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
