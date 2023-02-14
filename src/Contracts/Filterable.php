<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

interface Filterable
{

    public function filter(string|callable $criteria = null, mixed $test = null): Collection|static;

    public function matching(callable $criteria): Collection|static;

    public function notMatching(callable $criteria): Collection|static;

    public function hasAnyOf(int|string ...$key): bool;

    public function hasNoneOf(int|string ...$key): bool;

    public function keys(mixed $search = null): Collection|static;

    public function keysMatching(string|callable $criteria): Collection|static;

    public function unique(int $type = SORT_STRING): Collection|static;

    public function with(int|string ...$keys): Collection|static;

    public function without(int|string ...$keys): Collection|static;
}
