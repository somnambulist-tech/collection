<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Utils;

use Somnambulist\Collection\Contracts\Collection;
use Somnambulist\Collection\Contracts\Runnable;

/**
 * Class RunProxy
 *
 * Buffer to allow running methods on the collection without the collection needing
 * an __call method.
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\RunProxy
 */
final class RunProxy
{

    /**
     * @var Runnable
     */
    private $collection;

    /**
     * Constructor.
     *
     * @param $collection
     */
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
    public function __call($name, $arguments)
    {
        return $this->collection->run($name, ...$arguments);
    }
}
