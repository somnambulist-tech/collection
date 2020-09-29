<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

use BadMethodCallException;
use Closure;
use RuntimeException;

/**
 * Interface Runnable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Runnable
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
