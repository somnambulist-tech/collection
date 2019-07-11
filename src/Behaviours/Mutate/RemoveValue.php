<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

/**
 * Trait RemoveValue
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\RemoveValue
 *
 * @property array $items
 */
trait RemoveValue
{

    /**
     * Remove the value from the collection
     *
     * @param mixed $value
     *
     * @return static
     */
    public function remove($value)
    {
        $this->keys($value)->each(function ($key) { $this->offsetUnset($key); });

        return $this;
    }

    /**
     * Removes $value from the Collection
     *
     * @param mixed $value
     *
     * @return static
     */
    public function removeElement($value)
    {
        trigger_error(__METHOD__ . ' is deprecated use remove() instead', E_USER_DEPRECATED);

        if (false !== $key = $this->find($value)) {
            $this->remove($key);
        }

        return $this;
    }
}
