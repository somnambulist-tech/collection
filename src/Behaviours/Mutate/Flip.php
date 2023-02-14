<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_flip;

/**
 * @property array $items
 */
trait Flip
{

    /**
     * Exchange all values for keys and return new Collection
     *
     * Note: this should only be used with elements that can be used as valid PHP array keys.
     *
     * @link https://www.php.net/array_flip
     *
     * @return Collection|static
     */
    public function flip(): Collection|static
    {
        return $this->new(array_flip($this->items));
    }
}
