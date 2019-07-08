<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Partition;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait CanPartition
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Partition\CanPartition
 *
 * @property array $items
 */
trait CanPartition
{

    /**
     * Partition the Collection into two Collections using the given callback or key.
     *
     * Based on Laravel: Illuminate\Support\Collection.partition
     *
     * @param callable|string $callback
     *
     * @return static[static, static]
     */
    public function partition($callback): self
    {
        $partitions = [new static, new static];
        $callback   = Value::accessor($callback);

        foreach ($this->items as $key => $item) {
            $partitions[(int) ! $callback($item)][$key] = $item;
        }

        return new static($partitions);
    }
}
