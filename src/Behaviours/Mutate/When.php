<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use function is_callable;
use function is_null;

/**
 * @property array $items
 */
trait When
{
    /**
     * When the given test passes run the then callable on the collection
     *
     * Note: the original collection is always returned and not the result of the callable.
     * The test can be a callable or a value that can evaluate to true/false.
     *
     * @param mixed         $test The test to check, can be a callable
     * @param callable      $then
     * @param callable|null $else
     *
     * @return static
     */
    public function when(mixed $test, callable $then, ?callable $else = null): static
    {
        if (is_callable($test)) {
            $test = $test($this);
        }

        $test ? $then($this) : (is_null($else) ?: $else($this));

        return $this;
    }
}
