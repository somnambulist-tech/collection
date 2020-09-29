<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Utils\KeyWalker;

/**
 * Trait HasKeyWithDotNotation
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\HasKeyWithDotNotation
 *
 * @property array $items
 */
trait HasKeyWithDotNotation
{

    /**
     * Return true if the key(s) exist using dot notation
     *
     * This trait replaces the standard HasKey with one that can cascade into the collection
     * items e.g. user.*.town would look for a user key first, then any elements with a town
     * property / key. If any element has that key, true is returned.
     *
     * If no items match, then false is returned.
     *
     * Note: will return true for null/false key checks and properties.
     *
     * @param string ...$key
     *
     * @return bool
     */
    public function has(...$key): bool
    {
        $result = true;

        foreach ($key as $test) {
            $result = $result && KeyWalker::has($this, $test);
        }

        return $result;
    }

    /**
     * Returns true if the specified key exists in the Collection and is not empty
     *
     * Empty in this case is not an empty string, null, zero or false. It should not
     * be used to check for null or boolean values.
     *
     * @param string $key
     *
     * @return boolean
     */
    public function hasValueFor($key)
    {
        return ($this->has($key) && $this->get($key));
    }
}
