<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Exceptions\AssertionFailedException;

/**
 * Trait CanAssert
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanAssert
 */
trait CanAssert
{

    public function assert(callable $callback): self
    {
        foreach ($this->items as $key => $value) {
            if (false === $callback($value, $key)) {
                throw AssertionFailedException::assertionFailedFor($key, $value);
            }
        }

        return $this;
    }
}
