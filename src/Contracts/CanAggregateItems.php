<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

interface CanAggregateItems
{

    public function average(null|string|callable $key = null): float|int;

    public function max(null|string|callable $key = null): mixed;

    public function median(null|string|callable $key = null): float|int;

    public function min(null|string|callable $key = null): mixed;

    public function modal(null|string|callable $key = null): mixed;

    public function sum(null|string|callable $key = null): float|int;
}
