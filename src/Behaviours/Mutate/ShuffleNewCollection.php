<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use function shuffle;

/**
 * Trait ShuffleNewCollection
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\ShuffleNewCollection
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
     * @return Collection|static
     */
    public function shuffle(): Collection|static
    {
        $items = $this->items;

        shuffle($items);

        return $this->new($this);
    }
}
