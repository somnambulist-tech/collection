<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Utils;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * Class MapProxy
 *
 * Run a method on the collection objects, returning the output from calling that method.
 * This creates a `map()` call that calls the requested method, collects the results and
 * returns them in a new collection instance created via `new()`.
 *
 * @package    Somnambulist\Components\Collection\Utils
 * @subpackage Somnambulist\Components\Collection\Utils\MapProxy
 */
final class MapProxy
{

    private Collection $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Call the specified method on all items in the collection
     *
     * Arguments are expanded automatically for the method call if provided.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return Collection
     */
    public function __call(string $name, array $arguments): mixed
    {
        return $this->collection->map(fn ($value, $key) => $value->{$name}(...$arguments));
    }
}
