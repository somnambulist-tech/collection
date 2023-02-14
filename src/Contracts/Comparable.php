<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

interface Comparable
{

    public function diff(mixed $items): Collection|static;

    public function diffUsing(mixed $items, callable $callback): Collection|static;

    public function diffAssoc(mixed $items): Collection|static;

    public function diffAssocUsing(mixed $items, callable $callback): Collection|static;

    public function diffKeys(mixed $items): Collection|static;

    public function diffKeysUsing(mixed $items, callable $callback): Collection|static;

    public function intersect(mixed $items): Collection|static;

    public function intersectByKeys(mixed $items): Collection|static;
}
