<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface Assertable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Assertable
 */
interface Assertable
{

    public function assert(callable $callback): Collection|static;
}
