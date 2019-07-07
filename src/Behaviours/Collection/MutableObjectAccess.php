<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Collection;

/**
 * Trait MutableObjectAccess
 *
 * @package    Somnambulist\Collection\Behaviours\Collection
 * @subpackage Somnambulist\Collection\Behaviours\Collection\MutableObjectAccess
 *
 * @property array $items
 */
trait MutableObjectAccess
{

    public function __set($offset, $value)
    {
        $this->offsetSet($offset, $value);
    }

    public function __unset($offset)
    {
        $this->offsetUnset($offset);
    }

    /**
     * Append the value to the collection
     *
     * @param mixed $value
     *
     * @return self
     */
    public function add($value): self
    {
        $this->offsetSet(null, $value);

        return $this;
    }

    /**
     * Add the value at the specified offset to the collection
     *
     * @param string $offset
     * @param mixed  $value
     *
     * @return self
     */
    public function set($offset, $value): self
    {
        $this->offsetSet($offset, $value);

        return $this;
    }

    /**
     * Remove the value from the collection
     *
     * @param mixed $value
     *
     * @return self
     */
    public function remove($value): self
    {
        $this->keys($value)->each(function ($key) { $this->offsetUnset($key); });

        return $this;
    }

    /**
     * Remove the key from the collection
     *
     * @param string $offset
     *
     * @return MutableObjectAccess
     */
    public function unset($offset): self
    {
        $this->offsetUnset($offset);

        return $this;
    }
}
