<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

/**
 * Trait GetValue
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\GetValue
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
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if ($this->offsetExists($key)) {
            return $this->offsetGet($key);
        }

        return $default;
    }
}
