<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Diffable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Diffable
 */
interface Diffable
{

    public function diff($items): self;

    public function diffUsing($items, callable $callback): self;

    public function diffAssoc($items): self;

    public function diffAssocUsing($items, callable $callback): self;

    public function diffKeys($items): self;

    public function diffKeysUsing($items, callable $callback): self;
}
