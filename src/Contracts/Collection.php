<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

use ArrayAccess;
use Countable;
use IteratorAggregate;

interface Collection extends ArrayAccess, IteratorAggregate, Countable, Arrayable, Jsonable
{

    public function all(): array;

    public function contains(mixed $value): bool;

    public function doesNotContain(mixed $value): bool;

    public function each(callable $callback): Collection|static;

    public function filter(string|callable $criteria = null, mixed $test = null): Collection|static;

    public function first(): mixed;

    public function get(int|string $key, mixed $default = null): mixed;

    public function has(int|string ...$key): bool;

    public function keys(mixed $search = null): Collection|static;

    public function last(): mixed;

    public function map(callable $callable): Collection|static;

    public function new(mixed $items): Collection|static;

    public function value(int|string $key, mixed $default = null): mixed;

    public function values(): Collection|static;

}
