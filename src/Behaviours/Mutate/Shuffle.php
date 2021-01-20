<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use function shuffle;

/**
 * Trait Shuffle
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\Shuffle
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
     * @return Collection|static
     */
    public function shuffle(): Collection|static
    {
        shuffle($this->items);

        return $this;
    }
}
