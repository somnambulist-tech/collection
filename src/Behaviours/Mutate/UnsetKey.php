<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

/**
 * Trait UnsetKey
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\UnsetKey
 */
trait UnsetKey
{

    /**
     * Remove the key from the collection
     *
     * @param string $key
     *
     * @return static
     */
    public function unset($key)
    {
        $this->offsetUnset($key);

        return $this;
    }
}
