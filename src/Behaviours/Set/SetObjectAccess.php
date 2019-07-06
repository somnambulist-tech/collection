<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Set;

use DomainException;

/**
 * Trait MutableObjectAccess
 *
 * @package    Somnambulist\Collection\Behaviours\Set
 * @subpackage Somnambulist\Collection\Behaviours\Set\MutableObjectAccess
 */
trait SetObjectAccess
{

    public function __set($offset, $value)
    {
        if ($this->contains($value)) {
            throw new DomainException(sprintf('The set already contains a value of type "%s"', gettype($value)));
        }

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
        $this->__set(null, $value);

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
        $this->__set($offset, $value);

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
     * @return self
     */
    public function unset($offset): self
    {
        $this->offsetUnset($offset);

        return $this;
    }
}
