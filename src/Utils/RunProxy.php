<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Utils;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Contracts\Runnable;

/**
 * RunProxy
 *
 * Buffer to allow running methods on the collection without the collection needing
 * an __call method.
 */
final class RunProxy
{
    private Runnable $collection;

    public function __construct(Runnable $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Call the specified method on all items in the collection
     *
     * Arguments are automatically expanded.
     *
     * Note: return type is the static::class collection instance of the wrapped
     * collection class.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return Collection
     */
    public function __call(string $name, array $arguments): mixed
    {
        return $this->collection->run($name, ...$arguments);
    }
}
