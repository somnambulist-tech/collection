<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Somnambulist\Collection\Utils;

use ArrayAccess;
use Closure;
use Somnambulist\Collection\Collection;

/**
 * Class Support
 *
 * Shared methods used by Collection classes.
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\Support
 */
class Support
{

    /**
     * Returns true if value is callable, but not a string callable
     *
     * Based on Laravel: Illuminate\Support\Collection.useAsCallable
     *
     * @param  mixed $value
     *
     * @return bool
     */
    public static function isCallable($value)
    {
        return !is_string($value) && is_callable($value);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function isTraversable($value)
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }

    /**
     * Returns true if the key exists in the array
     *
     * @param mixed  $array
     * @param string $key
     *
     * @return bool
     */
    public static function keyExists($array, $key)
    {
        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }

    /**
     * Flattens nested arrays or Collections into a single array
     *
     * @param array|Collection $array
     *
     * @return array
     */
    public static function flatten($array)
    {
        $return = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $return = \array_merge($return, static::flatten($value));
            } elseif ($value instanceof Collection) {
                $return = \array_merge($return, static::flatten($value->all()));
            } else {
                $return[$key] = $value;
            }
        }

        return $return;
    }

    /**
     * Return the value or execute the callable
     *
     * @param mixed|callable $value
     *
     * @return mixed
     */
    public static function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}
