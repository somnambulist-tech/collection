<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Sortable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Sortable
 */
interface Sortable
{

    public function sortUsing($callable): self;

    public function sortUsingWithKeys($callable): self;

    public function sortByValue($type = SORT_STRING): self;

    public function sortByValueReversed($type = SORT_STRING): self;

    public function sortByKey($type = null): self;

    public function sortByKeyReversed($type = null): self;
}
