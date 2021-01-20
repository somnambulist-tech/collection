<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_reverse;

/**
 * Trait Reverse
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\Reverse
 *
 * @property array $items
 */
trait Reverse
{

    /**
     * Reverses the data in the Collection maintaining any keys
     *
     * @link https://www.php.net/array_reverse
     *
     * @return Collection|static
     */
    public function reverse(): Collection|static
    {
        $this->items = array_reverse($this->items, true);

        return $this;
    }
}
