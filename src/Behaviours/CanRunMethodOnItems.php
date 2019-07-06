<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Closure;

/**
 * Trait CanCallMethodOnItems
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanCallMethodOnItems
 */
trait CanRunMethodOnItems
{

    /**
     * Run the method or Closure on all object items in the collection
     *
     * A closure is passed: the current value, key and the unpacked arguments
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
