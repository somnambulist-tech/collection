<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Assertable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Assertable
 */
interface Assertable
{

    /**
     * Applies the test to all items in the collection
     *
     * If any element fails the test, an exception will be raised
     *
     * @param callable $callback
     *
     * @return self
     */
    public function assert(callable $callback): self;
}
