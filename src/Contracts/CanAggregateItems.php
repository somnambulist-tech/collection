<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface CanAggregateItems
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\CanAggregateItems
 */
interface CanAggregateItems
{

    public function average($key = null);

    public function max($key = null);

    public function median($key = null);

    public function min($key = null);

    public function modal($key = null);

    public function sum($key = null);
}
