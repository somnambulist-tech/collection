<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait Flatten
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MapReduce\Flatten
 *
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
     * @return static
     */
    public function flatten()
    {
        return $this->new(Value::flatten($this->items));
    }

    /**
     * Returns a new Collection with all sub-sets / arrays merged into one Collection
     *
     * Key names are flattened into dot notation, though overwrites may still occur.
     *
     * @return static
     */
    public function flattenWithDotKeys()
    {
        return $this->new(Value::flatten($this->items, true));
    }
}
