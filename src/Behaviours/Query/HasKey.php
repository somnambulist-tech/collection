<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

/**
 * Trait HasKey
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\HasKey
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
