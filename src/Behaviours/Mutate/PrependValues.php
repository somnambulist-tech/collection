<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;
use function array_unshift;

/**
 * @property array $items
 */
trait PrependValues
{

    /**
     * Prepends the elements to the beginning of the collection
     *
     * @link https://www.php.net/array_unshift
     *
     * @param mixed ...$value
     *
     * @return Collection|static
     */
    public function prepend(mixed ...$value): Collection|static
    {
        Value::assertAllOfType($value, $this->type);

        array_unshift($this->items, ...$value);

        return $this;
    }
}
