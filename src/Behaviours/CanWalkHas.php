<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Utils\KeyWalker;

/**
 * Trait CanWalkHas
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanWalkHas
 *
 * @property array $items
 */
trait CanWalkHas
{

    /**
     * Return true if the key exists using dot notation
     *
     * This trait replaces the standard HasKey with one that can cascade into the collection
     * items e.g. user.*.town would look for a user key first, then any elements with a town
     * property / key. If any element has that key, true is returned.
     *
     * If no items match, then false is returned.
     *
     * Note: will return true for null/false key checks and properties.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has($key): bool
    {
        return KeyWalker::has($this->items, $key);
    }
}
