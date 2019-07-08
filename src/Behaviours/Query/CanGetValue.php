<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use Somnambulist\Collection\Utils\Value;

/**
 * Trait CanGetValue
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\CanGetValue
 *
 * @property array $items
 */
trait CanGetValue
{

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
