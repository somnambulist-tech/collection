<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanFlip
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanFlip
 */
trait CanFlip
{

    /**
     * Exchange all values for keys and return new Collection
     *
     * Note: this should only be used with elements that can be used as valid PHP array keys.
     *
     * @link http://ca.php.net/array_flip
     *
     * @return static
     */
    public function flip(): self
    {
        return new static(array_flip($this->items));
    }
}
