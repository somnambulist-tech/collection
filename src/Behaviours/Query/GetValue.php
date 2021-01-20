<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

/**
 * Trait GetValue
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\GetValue
 *
 * @property array $items
 */
trait GetValue
{

    /**
     * Get the value at the specified key, if the _KEY_ does NOT exist, return the default
     *
     * Note: if the key is null or false, the value will be returned. If you must have a non
     * falsey value, use {@link value()} instead.
     *
     * @param int|string $key
     * @param mixed      $default
     *
     * @return mixed
     */
    public function get(int|string $key, mixed $default = null): mixed
    {
        if ($this->offsetExists($key)) {
            return $this->offsetGet($key);
        }

        return $default;
    }
}
