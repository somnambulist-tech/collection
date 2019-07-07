<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanRemoveKey
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanRemoveKey
 */
trait CanRemoveKey
{

    /**
     * Remove the key from the collection
     *
     * @param string $offset
     *
     * @return static
     */
    public function unset($offset): self
    {
        $this->offsetUnset($offset);

        return $this;
    }
}
