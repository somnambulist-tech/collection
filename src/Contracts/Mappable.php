<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface Mappable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Mappable
 */
interface Mappable
{

    public function collapse(): Collection|static;

    public function flatten(): Collection|static;

    public function map(string|callable $callable): Collection|static;

    public function reduce(callable $callback, mixed $initial = null): mixed;
}
