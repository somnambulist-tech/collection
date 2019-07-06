<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_pad;

/**
 * Trait CanPad
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanPad
 */
trait CanPad
{

    /**
     * Pads the Collection to size using value as the value of the new elements
     *
     * @link http://ca.php.net/array_pad
     *
     * @param integer $size
     * @param mixed   $value
     *
     * @return static
     */
    public function pad($size, $value): self
    {
        $this->items = array_pad($this->items, $size, $value);

        return $this;
    }
}
