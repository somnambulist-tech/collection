<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanRemoveItem
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanRemoveItem
 *
 * @property array $items
 */
trait CanRemoveItem
{

    /**
     * Remove the value from the collection
     *
     * @param mixed $value
     *
     * @return static
     */
    public function remove($value): self
    {
        if ($this->offsetExists($value)) {
            trigger_error('To remove keys, use unset(), remove is for values', E_USER_DEPRECATED);
            return $this->offsetUnset($value);
        }

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
    public function removeElement($value): self
    {
        trigger_error(__METHOD__ . ' is deprecated use remove() instead', E_USER_DEPRECATED);

        if (false !== $key = $this->find($value)) {
            $this->remove($key);
        }

        return $this;
    }
}
