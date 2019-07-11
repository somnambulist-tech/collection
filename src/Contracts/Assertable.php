<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

use Somnambulist\Collection\Exceptions\AssertionFailedException;

/**
 * Interface Assertable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Assertable
 */
interface Assertable
{

    /**
     * @param callable $callback
     *
     * @return static
     * @throws AssertionFailedException
     */
    public function assert(callable $callback);
}
