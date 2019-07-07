<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Filterable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Filterable
 */
interface Filterable
{

    public function filter($criteria = null): self;

    public function matching(callable $criteria): self;

    public function notMatching(callable $criteria): self;

    public function removeEmpty(array $empty = [false, null, '']): self;

    public function removeNulls(): self;

    public function hasAnyOf(...$key): bool;

    public function hasNoneOf(...$key): bool;

    public function keys($search = null, bool $strict = false): self;

    public function keysMatching($criteria): self;

    public function with(...$keys): self;

    public function without(...$keys): self;
}
