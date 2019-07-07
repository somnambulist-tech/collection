<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface MutableCollection
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\MutableCollection
 */
interface MutableCollection extends Collection
{

    public function add($value): self;
    public function append(...$value): self;
    public function clear(): self;
    public function concat($items): self;
    public function merge($value): self;
    public function prepend(...$value): self;
    public function push(...$value): self;
    public function remove($value): self;
    public function set($offset, $value): self;
    public function shift(): self;
    public function union($items): self;
    public function unset($offset): self;

}
