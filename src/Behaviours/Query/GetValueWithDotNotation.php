<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Utils\KeyWalker;

/**
 * Trait GetValueWithDotNotation
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\GetValueWithDotNotation
 *
 * @property array $items
 */
trait GetValueWithDotNotation
{

    /**
     * Get the value at the specified key using dot notation
     *
     * This trait replaces the standard CanGetKey with one that can cascade into the collection
     * items e.g. user.*.town would look for a user key first, then any elements with a town
     * property / key. The item(s) would then be returned.
     *
     * If the key is not found, then default will be returned that can be a closure.
     *
     * Note: if the key exists its VALUE is returned! This means it could be null / false. If
     * you need to ensure a particular value, use {@link value()} instead.
     *
     * @param int|string $key
     * @param mixed      $default
     *
     * @return mixed
     */
    public function get(int|string $key, mixed $default = null): mixed
    {
        return KeyWalker::get($this, $key, $default);
    }
}
