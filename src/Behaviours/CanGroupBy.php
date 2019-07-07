<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait CanGroupBy
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanGroupBy
 *
 * @property array $items
 */
trait CanGroupBy
{

    /**
     * Group the elements in the collection by the callable, returning a new collection
     *
     * The callable should return a valid key to group elements into. A valid key is
     * a string or integer or the current rules of PHP. Each group is a collection of
     * the values matched to it.
     *
     * @param callable $criteria
     *
     * @return static
     */
    public function groupBy(callable $criteria): self
    {
        $groups = [];

        foreach ($this->items as $key => $value) {
            $group = $criteria($value, $key);

            if (!isset($groups[$group])) {
                $groups[$group] = [];
            }

            $groups[$group][] = $value;
        }

        foreach ($groups as $group => $values) {
            $groups[$group] = new static($values);
        }

        return new static($groups);
    }
}
