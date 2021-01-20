<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\MapReduce;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * Trait FlatMap
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\MapReduce\FlatMap
 *
 * @property array $items
 */
trait FlatMap
{

    /**
     * Map a collection and flatten the result by a single level
     *
     * @link https://github.com/laravel/framework/blob/5.8/src/Illuminate/Support/Collection.php#L1213
     *
     * @param callable $callable
     *
     * @return Collection|static
     */
    public function flatMap(callable $callable): Collection|static
    {
        return $this->map($callable)->collapse();
    }
}
