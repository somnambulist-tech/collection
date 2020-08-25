<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_push;
use Somnambulist\Collection\Exceptions\DuplicateItemException;
use Traversable;

/**
 * Trait AppendOnlyUniqueValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\AppendOnlyUniqueValues
 *
 * @property array $items
 */
trait AppendOnlyUniqueValues
{

    /**
     * Append the value to the collection
     *
     * @param mixed $value
     *
     * @return static
     */
    public function add($value)
    {
        $this->append($value);

        return $this;
    }

    /**
     * Add elements to the end of the collection
     *
     * @link https://www.php.net/array_push
     *
     * @param mixed ...$value One or values to add
     *
     * @return static
     */
    public function append(...$value)
    {
        foreach ($value as $item) {
            if ($this->contains($item)) {
                throw DuplicateItemException::found($value, $this->keys($item)->first());
            }

            array_push($this->items, $item);
        }


        return $this;
    }

    /**
     * Push all of the given items onto the collection.
     *
     * @param iterable $items
     *
     * @return static
     */
    public function concat(iterable $items)
    {
        foreach ($items as $item) {
            $this->push($item);
        }

        return $this;
    }

    /**
     * Alias of append
     *
     * @param mixed ...$value
     *
     * @return static
     */
    public function push(...$value)
    {
        return $this->append(...$value);
    }
}
