<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_reverse;

/**
 * Trait CanReverse
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanReverse
 *
 * @property array $items
 */
trait CanReverse
{

    /**
     * Reverses the data in the Collection maintaining any keys
     *
     * @link https://www.php.net/array_reverse
     *
     * @return static
     */
    public function reverse()
    {
        $this->items = array_reverse($this->items, true);

        return $this;
    }
}
