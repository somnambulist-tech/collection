<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

use ArrayAccess;
use Countable;
use IteratorAggregate;

/**
 * Interface Collection
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Collection
 */
interface Collection extends ArrayAccess, IteratorAggregate, Countable, Arrayable, Jsonable
{

    public function all(): array;
    public function each(callable $callback): self;
    public function filter($criteria = null): self;
    public function first();
    public function get($key, $default = null);
    public function keys($search = null, bool $strict = false): self;
    public function last();
    public function map(callable $callable): self;
    public function value($key, $default = null);
    public function values(): self;

    public function contains($value): bool;
    public function doesNotContain($value): bool;
}
