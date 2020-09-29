<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Assertion;

use Somnambulist\Components\Collection\Exceptions\AssertionFailedException;

/**
 * Trait Assert
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Assertion\Assert
 *
 * @property array $items
 */
trait Assert
{

    /**
     * Run the test for all items in the collection; failures raise an exception
     *
     * @param callable $callback
     *
     * @return static
     * @throws AssertionFailedException
     */
    public function assert(callable $callback)
    {
        foreach ($this->items as $key => $value) {
            if (false === $callback($value, $key)) {
                throw AssertionFailedException::assertionFailedFor($value, $key);
            }
        }

        return $this;
    }
}
