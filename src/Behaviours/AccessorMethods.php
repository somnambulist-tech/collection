<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function end;
use function reset;
use Somnambulist\Collection\Utils\Value;

/**
 * Trait AccessorMethods
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\AccessorMethods
 */
trait AccessorMethods
{

    /**
     * Returns the first element from the collection
     *
     * @return mixed
     */
    public function first()
    {
        return reset($this->items);
    }

    /**
     * Get the value at the specified key, if the _KEY_ does NOT exist, return the default
     *
     * Note: if the key is null or false, the value will be returned. If you must have a non
     * falsey value, use {@link AbstractCollection::value()} instead.
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

    /**
     * Returns the first element of the Collection
     *
     * @return mixed
     */
    public function last()
    {
        return end($this->items);
    }

    /**
     * Returns the value for the specified key or if there is no value, returns the default
     *
     * Default can be a callable (closure) that will be executed. This method differs to
     * {@link static::get()} in that the default will be returned even when the key exists and
     * has no "truthy" value (null, false, empty string etc). Default can be a callable; this will
     * be passed the value (if any) and the key as arguments.
     *
     * @param string         $key
     * @param mixed|callable $default
     *
     * @return mixed
     */
    public function value($key, $default = null)
    {
        if ($value = $this->get($key)) {
            return $value;
        }

        return Value::get($default, $value, $key);
    }
}
