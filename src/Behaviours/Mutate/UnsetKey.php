<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

/**
 * Trait UnsetKey
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\UnsetKey
 */
trait UnsetKey
{

    /**
     * Remove the key from the collection
     *
     * @param string $offset
     *
     * @return static
     */
    public function unset($offset)
    {
        $this->offsetUnset($offset);

        return $this;
    }
}
