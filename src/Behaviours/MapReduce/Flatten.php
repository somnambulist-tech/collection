<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\MapReduce;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * @property array $items
 */
trait Flatten
{

    /**
     * Returns a new Collection with all sub-sets / arrays merged into one Collection
     *
     * If similar keys exist, they will be overwritten. This method is
     * intended to convert a multi-dimensional array into a key => value
     * array. This method is called recursively through the Collection.
     *
     * @return Collection|static
     */
    public function flatten(): Collection|static
    {
        return $this->new(Value::flatten($this->items));
    }

    /**
     * Returns a new Collection with all sub-sets / arrays merged into one Collection
     *
     * Key names are flattened into dot notation, though overwrites may still occur.
     *
     * @return Collection|static
     */
    public function flattenWithDotKeys(): Collection|static
    {
        return $this->new(Value::flatten($this->items, true));
    }
}
