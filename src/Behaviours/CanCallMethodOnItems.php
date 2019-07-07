<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Closure;
use function is_object;
use function method_exists;
use Somnambulist\Collection\Contracts\Collection;

/**
 * Trait CanCallMethodOnItems
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanCallMethodOnItems
 *
 * @property array $items
 */
trait CanCallMethodOnItems
{

    /**
     * Allows method names on sub-objects to be called on the Collection
     *
     * Calls into {@link run} to actually run the method.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return $this
     */
    public function __call($name, $arguments)
    {
        return $this->run($name, ...$arguments);
    }

    /**
     * Alias of run()
     *
     * @param string $method
     * @param array  $arguments
     *
     * @return CanCallMethodOnItems
     */
    public function invoke($method, array $arguments = []): self
    {
        trigger_error(__METHOD__ . ' is deprecated; use run() instead', E_USER_DEPRECATED);

        return $this->run($method, ...$arguments);
    }

    /**
     * Run the method or Closure on all object items in the collection
     *
     * If a closure is passed the current value, key and the unpacked arguments are provided.
     * The method is passed: the unpacked arguments
     *
     * Only objects are processed.
     *
     * @param string|Closure $method
     * @param mixed          ...$arguments
     *
     * @return static
     */
    public function run($method, ...$arguments): self
    {
        foreach ($this->items as $key => $value) {
            if (!is_object($value)) {
                continue;
            }

            if ($method instanceof Closure) {
                $method($value, $key, ...$arguments);
                continue;
            }

            if (method_exists($value, $method)) {
                $value->{$method}(...$arguments);
                continue;
            }
        }

        return $this;
    }
}
