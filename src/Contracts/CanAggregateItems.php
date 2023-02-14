<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

interface CanAggregateItems
{

    public function average(string|callable $key = null): float|int;

    public function max(string|callable $key = null): mixed;

    public function median(string|callable $key = null): float|int;

    public function min(string|callable $key = null): mixed;

    public function modal(string|callable $key = null): mixed;

    public function sum(string|callable $key = null): float|int;
}
