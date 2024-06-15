<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\Utils\Value;
use function array_push;

/**
 * @property array $items
 */
trait AppendOnlyUniqueValues
{

    /**
     * Append the value to the collection
     *
     * @param mixed $value
     *
     * @return Collection|static
     */
    public function add(mixed $value): Collection|static
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
     * @return Collection|static
     */
    public function append(mixed ...$value): Collection|static
    {
        foreach ($value as $item) {
            Value::assertIsOfType($item, $this->type);

            if ($this->contains($item)) {
                throw DuplicateItemException::found($value, $this->keys($item)->first());
            }

            array_push($this->items, $item);
        }


        return $this;
    }

    /**
     * Push all the given items onto the collection.
     *
     * @param iterable $items
     *
     * @return Collection|static
     */
    public function concat(iterable $items): Collection|static
    {
        foreach ($items as $item) {
            $this->append($item);
        }

        return $this;
    }

    /**
     * Alias of append
     *
     * @param mixed ...$value
     *
     * @return Collection|static
     */
    public function push(mixed ...$value): Collection|static
    {
        return $this->append(...$value);
    }
}
