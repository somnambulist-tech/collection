<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\MapReduce;

/**
 * Trait MapInto
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\MapReduce\MapInto
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
     * @return static
     */
    public function mapInto(string $class)
    {
        return $this->map(function ($value, $key) use ($class) {
            return new $class($value, $key);
        });
    }
}
