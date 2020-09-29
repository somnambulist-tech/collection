<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use function array_push;

/**
 * Trait AppendValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\AppendValues
 *
 * @property array $items
 */
trait AppendValues
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
        array_push($this->items, ...$value);

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
