<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

use Somnambulist\Components\Collection\Exceptions\AssertionFailedException;

/**
 * Interface Assertable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Assertable
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
