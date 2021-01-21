<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface Mutable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Mutable
 */
interface Mutable extends Collection
{

    public function add(mixed $value): Collection|static;

    public function append(mixed ...$value): Collection|static;

    public function clear(): Collection|static;

    public function concat(iterable $items): Collection|static;

    public function merge(mixed $value): Collection|static;

    public function prepend(mixed ...$value): Collection|static;

    public function push(mixed ...$value): Collection|static;

    public function remove(mixed $value): Collection|static;

    public function set(int|string $key, mixed $value): Collection|static;

    public function shift(): mixed;

    public function union(mixed $items): Collection|static;

    public function unset(int|string $key): Collection|static;

}
