<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Utils;

use Somnambulist\Collection\Contracts\Collection;
use Somnambulist\Collection\Contracts\Runnable;

/**
 * Class MapProxy
 *
 * Run a method on the collection objects, returning the output from calling that method.
 * This creates a `map()` call that calls the requested method, collects the results and
 * returns them in a new collection instance created via `new()`.
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\MapProxy
 */
final class MapProxy
{

    /**
     * @var Runnable
     */
    private $collection;

    /**
     * Constructor.
     *
     * @param Collection $collection
     */
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
    public function __call($name, $arguments)
    {
        return $this->collection->map(function ($value, $key) use ($name, $arguments) {
            return $value->{$name}(...$arguments);
        });
    }
}
