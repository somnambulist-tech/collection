<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Pipes;

use BadMethodCallException;
use Closure;
use RuntimeException;
use Somnambulist\Components\Collection\Contracts\Collection;
use function get_class;
use function gettype;
use function is_object;
use function method_exists;

/**
 * @property array $items
 */
trait RunMethodOnValues
{

    /**
     * Run the method or Closure on all object items in the collection
     *
     * If a closure is passed the current value, key and the unpacked arguments are provided.
     * The method is passed: the unpacked arguments
     *
     * run() can only be used with a Collection that contains objects or when the method is a
     * Closure. If a non-object type is encountered an Exception will be raised.
     *
     * @param string|callable $method
     * @param mixed           ...$arguments
     *
     * @return Collection|static
     * @throws RuntimeException
     * @throws BadMethodCallException
     */
    public function run(string|callable $method, mixed ...$arguments): Collection|static
    {
        foreach ($this->items as $key => $value) {
            if ($method instanceof Closure) {
                $method($value, $key, ...$arguments);
                continue;
            }

            if (!is_object($value)) {
                throw new RuntimeException(sprintf(
                    'Value is "%s" and "%s" cannot be called on it. Ensure collection only contains objects',
                    gettype($value), $method
                ));
            }

            if (!method_exists($value, $method)) {
                throw new BadMethodCallException(sprintf('Method "%s" not found on object "%s"', $method, get_class($value)));
            }

            $value->{$method}(...$arguments);
        }

        return $this;
    }
}
