<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Partition;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;

/**
 * Trait Partition
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Partition\Partition
 *
 * @property array $items
 */
trait Partition
{

    /**
     * Partition the Collection into two Collections using the given callback or key.
     *
     * Based on Laravel: Illuminate\Support\Collection.partition
     *
     * @param callable|string $callback
     *
     * @return Collection|static[static, static]
     */
    public function partition(string|callable $callback): Collection|static
    {
        $partitions = [[], []];
        $callback   = Value::accessor($callback);

        foreach ($this->items as $key => $item) {
            $partitions[(int) ! $callback($item)][$key] = $item;
        }

        return $this->new([$this->new($partitions[0]), $this->new($partitions[1])]);
    }
}
