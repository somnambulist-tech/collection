<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

/**
 * Trait CanRemapKeys
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanRemapKeys
 *
 * @property array $items
 */
trait CanRemapKeys
{

    /**
     * From the provided map of key -> new_key; change the current key to new_key
     *
     * The previous key is unset from the collection.
     *
     * @param array $map
     *
     * @return static
     */
    public function remapKeys(array $map): self
    {
        foreach ($this->items as $key => $value) {
            if (isset($map[$key])) {
                $this->items[$map[$key]] = $value;
                $this->offsetUnset($key);
            }
        }

        return $this;
    }
}
