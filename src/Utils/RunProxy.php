<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Utils;

use Somnambulist\Collection\Contracts\Runnable;

/**
 * Class Proxy
 *
 * Buffer to allow running methods on the collection without the collection needing
 * an __call method.
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\Proxy
 */
class RunProxy
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

    public function __call($name, $arguments)
    {
        return $this->collection->run($name, ...$arguments);
    }
}
