<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

interface Assertable
{

    public function assert(callable $callback): Collection|static;
}
