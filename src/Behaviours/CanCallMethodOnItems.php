<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Closure;
use function is_object;
use function method_exists;

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
     * @return self
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
