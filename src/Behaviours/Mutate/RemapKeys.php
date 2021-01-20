<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * Trait RemapKeys
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\RemapKeys
 *
 * @property array $items
 */
trait RemapKeys
{

    /**
     * From the provided map of key -> new_key; change the current key to new_key
     *
     * The previous key is unset from the collection.
     *
     * @param array $map
     *
     * @return Collection|static
     */
    public function remapKeys(array $map): Collection|static
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
