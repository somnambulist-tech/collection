<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanCallMethodOnItems
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanCallMethodOnItems
 */
trait CanTransformItems
{

    /**
     * Apply the callback to all elements in the collection, keys are not preserved
     *
     * @link https://www.php.net/array_map
     *
     * @param callable $callable
     *
     * @return CanTransformItems
     */
    public function map(callable $callable): self
    {
        return $this->transform($callable, false);
    }

    /**
     * Creates a new Collection containing the results of the callable
     *
     * For example: with a collection of the same objects, call a method to export
     * part of each object into a new collection. Similar to using each() or walk()
     * except the callable should return the new value for the key.
     *
     * If $preserveKeys is true, the key will be applied to the new collection, if
     * false, the keys will be re-assigned numeric keys.
     *
     * @param callable $transformer
     * @param bool     $preserveKeys (default true)
     *
     * @return self
     */
    public function transform(callable $transformer, bool $preserveKeys = true): self
    {
        $transformed = [];

        foreach ($this->items as $key => $value) {
            if (true === $preserveKeys) {
                $transformed[$key] = $transformer($value, $key);
            } else {
                $transformed[] = $transformer($value, $key);
            }
        }

        return new static($transformed);
    }
}
