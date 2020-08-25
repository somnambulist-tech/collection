<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

use BadMethodCallException;
use Closure;
use RuntimeException;

/**
 * Interface Runnable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Runnable
 */
interface Runnable
{

    /**
     * @param string|Closure $method
     * @param mixed          ...$arguments
     *
     * @return Collection
     * @throws RuntimeException
     * @throws BadMethodCallException
     */
    public function run($method, ...$arguments);
}
