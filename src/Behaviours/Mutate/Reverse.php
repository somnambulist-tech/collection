<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_reverse;

/**
 * Trait Reverse
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\Reverse
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
     * @return static
     */
    public function reverse()
    {
        $this->items = array_reverse($this->items, true);

        return $this;
    }
}
