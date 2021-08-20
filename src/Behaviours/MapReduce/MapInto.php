<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\MapReduce;

use Somnambulist\Components\Collection\Contracts\Collection;

/**
 * Trait MapInto
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\MapReduce\MapInto
 *
 * @property array $items
 */
trait MapInto
{

    /**
     * Map the values into a new class.
     *
     * @link https://github.com/laravel/framework/blob/5.8/src/Illuminate/Support/Collection.php#L1224
     *
     * @param string $class
     *
     * @return Collection|static
     */
    public function mapInto(string $class): Collection|static
    {
        return $this->map(fn ($value, $key) => new $class($value, $key));
    }
}
