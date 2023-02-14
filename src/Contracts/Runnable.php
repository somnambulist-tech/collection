<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

use BadMethodCallException;
use RuntimeException;

interface Runnable
{

    /**
     * @param string|callable $method
     * @param mixed          ...$arguments
     *
     * @return Collection|static
     * @throws RuntimeException
     * @throws BadMethodCallException
     */
    public function run(string|callable $method, mixed ...$arguments): Collection|static;
}
