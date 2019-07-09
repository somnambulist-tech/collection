<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_pad;

/**
 * Trait Pad
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\Pad
 *
 * @property array $items
 */
trait Pad
{

    /**
     * Pads the Collection to size using value as the value of the new elements
     *
     * @link https://www.php.net/array_pad
     *
     * @param integer $size
     * @param mixed   $value
     *
     * @return static
     */
    public function pad($size, $value)
    {
        $this->items = array_pad($this->items, $size, $value);

        return $this;
    }
}
