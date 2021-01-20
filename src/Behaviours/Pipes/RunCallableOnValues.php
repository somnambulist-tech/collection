<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Pipes;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * Trait RunCallableOnValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Pipes\RunCallableOnValues
 *
 * @property array $items
 */
trait RunCallableOnValues
{

    /**
     * Execute a callback over the collection, halting if the callback returns false
     *
     * @param callable $callback Receives: ($value, $key)
     *
     * @return Collection|static
     */
    public function each(callable $callback): Collection|static
    {
        foreach ($this->items as $key => $value) {
            if (false === $callback($value, $key)) {
                break;
            }
        }

        return $this;
    }
}
