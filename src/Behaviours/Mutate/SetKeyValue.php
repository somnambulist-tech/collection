<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

/**
 * Trait SetKeyValue
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\SetKeyValue
 *
 * @property array $items
 */
trait SetKeyValue
{

    /**
     * Add the value at the specified key/offset to the collection
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return static
     */
    public function set($key, $value)
    {
        $this->offsetSet($key, $value);

        return $this;
    }
}
