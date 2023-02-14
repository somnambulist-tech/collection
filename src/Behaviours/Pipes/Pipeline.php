<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Pipes;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * @property array $items
 */
trait Pipeline
{

    /**
     * Transform a passed Collection of items using an Operator method
     *
     * Given a set of Operators that all implement the same interface, pass the Collection of
     * items to each Operator, calling a method on the operator that will transform each item
     * in the items Collection, creating a new Collection that is passed to subsequent Operators.
     *
     * In other words, if the Collection contains e.g. decorators that will add / modify an entity,
     * then `pipeline` will pass each item in turn through each decorator. Each time a new Collection
     * is built from the output of the previous decorator. This allows chaining the decorator calls.
     *
     * A method name for the Operator can be used as the second argument, otherwise a callable
     * must be provided that is passed: the operator object, an item from the items iterable
     * and the key. The callable should return the transformed item. The created Collection
     * preserves the keys, hence order, of the original items.
     *
     * This method can be used to modify a set of read-only objects via a series of independent,
     * but linked transformations. This is similar to the pipeline pattern, except it works on a
     * Collection instead of a single item.
     *
     * @param iterable        $items
     * @param string|callable $through Method name to call on the operator, or a closure
     *
     * @return Collection|static
     */
    public function pipeline(iterable $items, string|callable $through): Collection|static
    {
        foreach ($this->items as $key => $operator) {
            $new = [];

            if (!Value::isCallable($through)) {
                $through = fn ($operator, $item, $key) => $operator->{$through}($item);
            }

            foreach ($items as $k => $item) {
                $new[$k] = $through($operator, $item, $k);
            }

            $items = $new;
        }

        return $this->new($items);
    }
}
