<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait HasKey
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\HasKey
 */
trait HasKey
{

    /**
     * Returns true if the key(s) all exist in the collection
     *
     * @param string ...$key
     *
     * @return bool
     */
    public function has(...$key): bool
    {
        $result = true;

        foreach ($key as $test) {
            $result = $result && $this->offsetExists($test);
        }

        return $result;
    }
}
