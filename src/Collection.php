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

namespace Somnambulist\Collection;

use Somnambulist\Collection\Traits;
use Somnambulist\Collection\Utils\Support;

/**
 * Class Collection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\Collection
 * @author     Dave Redfern
 */
class Collection implements \ArrayAccess, \Countable, \IteratorAggregate, \Serializable
{

    use Traits\ArrayAccess;
    use Traits\Exportable;
    use Traits\MagicMethods;
    use Traits\Serializable;
    use Traits\Sortable;

    /**
     * The Collection
     *
     * @var array
     */
    protected $items = [];

    /**
     * Constructor.
     *
     * @param mixed $items An array/item/Collection of data
     */
    public function __construct($items = [])
    {
        $this->items = Factory::convertToArray($items);
    }

    /**
     * Creates a new collection with the items
     *
     * @param mixed $items
     *
     * @return static
     */
    public static function collect($items)
    {
        return new static($items);
    }

    /**
     * Returns the number of items in the Collection
     *
     * @return integer
     */
    public function count()
    {
        return \count($this->items);
    }

    /**
     * Returns the iterable data
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }



    /**
     * Adds an item to the Collection if it does not already exist
     *
     * This is the same as getting the instance of Collection and using it as an array:
     * <code>
     * $col = new Collection();
     * $col->add('value1');
     * // is the same as:
     * $col[] = 'value1';
     * </code>
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function add($value)
    {
        $this->offsetSet(null, $value);

        return $this;
    }

    /**
     * Returns all items in the Collection
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Appends the array or Collection object to this Collection, without reindexing the keys
     *
     * This is the equivalent of $array + $array.
     *
     * @link http://ca.php.net/array_merge
     *
     * @param mixed $array either array, ArrayObject or Collection
     *
     * @return $this
     */
    public function append($array)
    {
        $this->items = $this->items + Factory::convertToArray($array);

        return $this;
    }

    /**
     * Assert that all elements pass the test provided by the callback
     *
     * @param callable $callback
     *
     * @return bool
     */
    public function assert(callable $callback): bool
    {
        foreach ($this->items as $key => $item) {
            if ($callback($item, $key) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Alias of transform
     *
     * @param callable $callable Receives: $value, $key
     *
     * @return static
     * @deprecated v2 Use transform
     */
    public function call(callable $callable)
    {
        return $this->transform($callable);
    }

    /**
     * Returns true if the value is in the Collection
     *
     * @link http://ca.php.net/in_array
     *
     * @param mixed $value
     *
     * @return boolean
     */
    public function contains($value): bool
    {
        return \in_array($value, $this->items, (is_scalar($value) ? false : true));
    }

    /**
     * Returns a new Collection containing the items not in $items
     *
     * @link http://ca.php.net/array_diff
     *
     * @param array|Collection $items
     *
     * @return static
     */
    public function diff($items)
    {
        return new static(array_diff($this->items, Factory::convertToArray($items)));
    }

    /**
     * Returns a new Collection containing the items not in $items
     *
     * @link http://ca.php.net/array_diff_keys
     *
     * @param array|Collection $items
     *
     * @return static
     */
    public function diffKeys($items)
    {
        return new static(array_diff_key($this->items, Factory::convertToArray($items)));
    }

    /**
     * Execute a callback over the collection
     *
     * @param callable $callback Receives: ($item, $key)
     *
     * @return static
     */
    public function each(callable $callback)
    {
        foreach ($this->items as $key => $item) {
            if ($callback($item, $key) === false) {
                break;
            }
        }

        return $this;
    }

    /**
     * Get all items except for those with the specified keys.
     *
     * @param mixed $ignore Array of key names, or multiple arguments
     *
     * @return static
     */
    public function except($ignore)
    {
        $ignore = is_array($ignore) ? $ignore : func_get_args();

        return $this->filter(function ($value, $key) use ($ignore) {
            return !in_array($key, $ignore, true);
        });
    }

    /**
     * Extract the values for all items with an element named $element, optionally indexed by $withKey
     *
     * @param string      $element
     * @param string|null $withKey
     *
     * @return static
     */
    public function extract($element, $withKey = null)
    {
        return new static(Utils\CollectionKeyWalker::extract($this, $element, $withKey));
    }

    /**
     * Filters the Collection through callback returning a new Collection
     *
     * Callback will receive both the value and the key as ARRAY_FILTER_USE_BOTH is passed
     * to
     *
     * @link http://ca.php.net/array_filter
     *
     * @param mixed $callback PHP callable, closure or function
     *
     * @return static
     */
    public function filter($callback = null)
    {
        return new static(\array_filter($this->items, $callback, ARRAY_FILTER_USE_BOTH));
    }

    /**
     * Synonym for {@link search()}
     *
     * Searches the Collection for $value returning the corresponding key where the
     * item was found. Returns false if not found. Key may also be 0 (zero).
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function find($value)
    {
        return $this->search($value);
    }

    /**
     * Returns a new Collection with all sub-sets / arrays merged into one Collection
     *
     * If similar keys exist, they will be overwritten. This method is
     * intended to convert a multi-dimensional array into a key => value
     * array. This method is called recursively through the Collection.
     *
     * @return static
     */
    public function flatten()
    {
        $col = new static();

        foreach ($this as $key => $value) {
            if (is_array($value) || $value instanceof Collection) {
                $col->merge(Support::flatten($value));
            } else {
                $col[$key] = $value;
            }
        }

        return $col;
    }

    /**
     * Fill an array with values beginning at index defined by start for count members
     *
     * Start can be a negative number. Count can be zero or more.
     *
     * @link http://ca.php.net/array_fill
     *
     * @param int   $start
     * @param int   $count
     * @param mixed $value
     *
     * @return static
     */
    public function fill($start, $count, $value)
    {
        return new static(array_fill($start, $count, $value));
    }

    /**
     * For all values in the current Collection, use as a key and assign $value to them
     *
     * This should only be used with scalar values that can be used as array keys.
     * A new Collection is returned with all previous values as keys, assigned the value.
     *
     * @link http://ca.php.net/array_fill_keys
     *
     * @param mixed $value
     *
     * @return static
     */
    public function fillKeysWith($value)
    {
        return new static(array_fill_keys($this->values()->toArray(), $value));
    }

    /**
     * Returns the first element of the Collection
     *
     * @return mixed
     */
    public function first()
    {
        return reset($this->items);
    }

    /**
     * Exchange all values for keys and return new Collection
     *
     * Note: this should only be used with elements that can be used as valid
     * PHP array keys.
     *
     * @link http://ca.php.net/array_flip
     *
     * @return static
     */
    public function flip()
    {
        return new static(array_flip($this->items));
    }

    /**
     * Returns an immutable collection of this Collection
     *
     * @return Immutable
     */
    public function freeze()
    {
        return new Immutable($this->items);
    }

    /**
     * Returns the item from the Collection, null if not found
     *
     * @param mixed $key
     * @param mixed $default (optional) If key is not found, returns this value (null by default)
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return Utils\CollectionKeyWalker::walk($this, $key, $default);
    }

    /**
     * Returns true if the specified key exists in the Collection
     *
     * @param string $key
     *
     * @return boolean
     */
    public function has($key)
    {
        return ($this->offsetExists($key));
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
        return ($this->offsetExists($key) && $this->get($key));
    }

    /**
     * @param null|string $glue
     *
     * @return string
     */
    public function implode($glue = null)
    {
        return implode($glue, $this->items);
    }

    /**
     * @param null|string $glue
     *
     * @return string
     */
    public function implodeKeys($glue = null)
    {
        return $this->keys()->implode($glue);
    }

    /**
     * Returns a new collection containing all the items that exist in the passed items
     *
     * @link http://ca.php.net/array_intersect
     *
     * @param mixed $items
     *
     * @return static
     */
    public function intersect($items)
    {
        return new static(array_intersect($this->items, Factory::convertToArray($items)));
    }

    /**
     * Runs $method on all object instances in the Collection
     *
     * Invoke allows the same method to be called on all objects in the
     * current Collection. Useful for setting a specific value, or triggering
     * an update across multiple objects in one go. Only object values
     * are used.
     *
     * Optionally $arguments can be provided and the method will be passed each
     * parameter as an argument.
     *
     * For more than 2 parameters, call_user_func_array is used.
     *
     * @param string $method    Name of the method to call
     * @param array  $arguments Parameter list to use when calling $method
     *
     * @return $this
     */
    public function invoke($method, array $arguments = [])
    {
        if ($this->count() > 0) {
            foreach ($this as $key => $value) {
                if (\is_object($value) && \method_exists($value, $method)) {
                    switch (\count($arguments)) {
                        case 0:
                            $value->{$method}();
                            break;
                        case 1:
                            $value->{$method}($arguments[0]);
                            break;
                        case 2:
                            $value->{$method}($arguments[0], $arguments[1]);
                            break;
                        default:
                            \call_user_func_array([$value, $method], $arguments);
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Returns the array keys, optionally searching for $search
     *
     * If strict is true, keys must match exactly $search (===)
     *
     * @link http://ca.php.net/array_keys
     *
     * @param string  $search (optional)
     * @param boolean $strict (optional)
     *
     * @return static
     */
    public function keys($search = null, $strict = null)
    {
        if (null === $search && null === $strict) {
            $keys = \array_keys($this->items);
        } elseif (null !== $search && null === $strict) {
            $keys = \array_keys($this->items, $search);
        } else {
            $keys = \array_keys($this->items, $search, $strict);
        }

        return new static($keys);
    }

    /**
     * Returns the last element of the Collection
     *
     * @return mixed
     */
    public function last()
    {
        return end($this->items);
    }

    /**
     * Returns a new collection will all values mapped to lower case
     *
     * @return Collection
     */
    public function lower()
    {
        return $this->map(function ($item) {
            return (function_exists('mb_strtolower')) ? mb_strtolower($item) : strtolower($item);
        });
    }

    /**
     * Runs the function $callback across the current Collection
     *
     * @link http://ca.php.net/array_map
     *
     * @param callable $callback Receives the value from the key
     *
     * @return static
     */
    public function map($callback)
    {
        return new static(\array_map($callback, $this->items));
    }

    /**
     * Find keys and values using a regular expression, returning a new Collection
     *
     * Similar to {@link keys} but allows any PERL regular expression to be
     * used for locating a matching key. Returns a new Collection containing matching
     * keys and values.
     *
     * @param string $regex PERL regular expression
     *
     * @return static
     */
    public function match($regex)
    {
        $col = new static();

        foreach ($this as $key => $value) {
            if (\preg_match($regex, $key)) {
                $col[$key] = $value;
            }
        }

        return $col;
    }

    /**
     * Returns the highest value from the collection of values
     *
     * Key can be a string key or callable. Based on Laravel: Illuminate\Support\Collection.max
     *
     * @param null|string $key
     *
     * @return mixed
     */
    public function max($key = null)
    {
        $callback = $this->valueAccessor($key);

        return $this->filter(function ($value) {
            return !is_null($value);
        })->reduce(function ($result, $item) use ($callback) {
            $value = $callback($item);

            return is_null($result) || $value > $result ? $value : $result;
        });
    }

    /**
     * Returns the lowest value from the collection of values
     *
     * Key can be a string key or callable. Based on Laravel: Illuminate\Support\Collection.min
     *
     * @param null|string $key
     *
     * @return mixed
     */
    public function min($key = null)
    {
        $callback = $this->valueAccessor($key);

        return $this->filter(function ($value) {
            return !is_null($value);
        })->reduce(function ($result, $item) use ($callback) {
            $value = $callback($item);

            return is_null($result) || $value < $result ? $value : $result;
        });
    }

    /**
     * Merges the supplied array into the current Collection
     *
     * Note: should only be used with Collections of the same data, may cause strange results.
     * This method will re-index keys and overwrite existing values. If you wish to
     * preserve keys and values see {@link append}.
     *
     * @link http://ca.php.net/array_merge
     *
     * @param mixed $array either array, ArrayObject, or Collection
     *
     * @return $this
     */
    public function merge($array)
    {
        $this->items = \array_merge($this->items, Factory::convertToArray($array));

        return $this;
    }

    /**
     * Returns a new collection containing only these keys
     *
     * @param mixed $keys Array of key names, or multiple arguments
     *
     * @return Collection
     */
    public function only($keys)
    {
        $keys = is_array($keys) ? $keys : func_get_args();

        return $this->filter(function ($value, $key) use ($keys) {
            return in_array($key, $keys, true);
        });
    }

    /**
     * Pads the Collection to size using value as the value of the new elements
     *
     * @link http://ca.php.net/array_pad
     *
     * @param integer $size
     * @param mixed   $value
     *
     * @return $this
     */
    public function pad($size, $value)
    {
        $this->items = \array_pad($this->items, $size, $value);

        return $this;
    }

    /**
     * Partition the Collection into two Collections using the given callback or key.
     *
     * Based on Laravel: Illuminate\Support\Collection.partition
     *
     * @param callable|string $callback
     *
     * @return static[static, static]
     */
    public function partition($callback)
    {
        $partitions = [new static, new static];
        $callback   = $this->valueAccessor($callback);

        foreach ($this->items as $key => $item) {
            $partitions[(int) ! $callback($item)][$key] = $item;
        }

        return new static($partitions);
    }

    /**
     * Pops the element off the end of the Collection
     *
     * @link http://ca.php.net/array_pop
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->items);
    }

    /**
     * Reduces the Collection to a single value, returning it, or $initial if no value
     *
     * @link http://ca.php.net/array_reduce
     *
     * @param callable $callback Receives mixed $carry, mixed $value
     * @param mixed    $initial  (optional) Default value to return if no result
     *
     * @return mixed
     */
    public function reduce($callback, $initial = null)
    {
        return \array_reduce($this->items, $callback, $initial);
    }

    /**
     * Removes the key from the Collection
     *
     * @param mixed $key
     *
     * @return $this
     */
    public function remove($key)
    {
        $this->offsetUnset($key);

        return $this;
    }

    /**
     * Removes $value from the Collection
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function removeElement($value)
    {
        if (false !== $key = $this->search($value)) {
            $this->remove($key);
        }

        return $this;
    }

    /**
     * Removes values that are matched as empty through an equivalence check
     *
     * @param array $empty Array of values considered to be "empty"
     *
     * @return Collection
     */
    public function removeEmpty(array $empty = [false, null, ''])
    {
        return $this->filter(function ($item) use ($empty) {
            return !in_array($item, $empty, true);
        });
    }

    /**
     * Removes any null items from the Collection, returning a new collection
     *
     * @return Collection
     */
    public function removeNulls()
    {
        return $this->filter(function ($item) {
            return !is_null($item);
        });
    }

    /**
     * Resets the Collection
     *
     * @return void
     */
    public function reset()
    {
        $this->items = [];
    }

    /**
     * Reverses the data in the Collection maintaining any keys
     *
     * @link http://ca.php.net/array_reverse
     *
     * @return $this
     */
    public function reverse()
    {
        $this->items = \array_reverse($this->items, true);

        return $this;
    }

    /**
     * Searches the Collection via {@link http://ca.php.net/array_search array_search}
     *
     * Searches the Collection for an item returning the corresponding key where the
     * item was found. Returns false if not found. Key may also be 0 (zero).
     *
     * @link http://ca.php.net/array_search
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function search($value)
    {
        return \array_search($value, $this->items, (\is_object($value) ? true : null));
    }

    /**
     * Add the item with key to the Collection
     *
     * If item is an array and value is null, the Collection will be replaced with
     * the items.
     *
     * Note: replacing the Collection contents is considered deprecated and will be removed
     * in the next major version.
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return $this
     */
    public function set($key, $value = null)
    {
        if (\is_array($key) && $value === null) {
            $this->items = $key;
            trigger_error('Replacing collection contents via set is deprecated', E_USER_DEPRECATED);
        } else {
            $this->offsetSet($key, $value);
        }

        return $this;
    }

    /**
     * Shifts an element off the beginning of the Collection
     *
     * @link http://ca.php.net/array_shift
     *
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->items);
    }

    /**
     * Shuffle the items in the collection.
     *
     * @link http://php.net/manual/en/function.shuffle.php
     *
     * @return static
     */
    public function shuffle()
    {
        $items = $this->items;
        shuffle($items);

        return new static($items);
    }

    /**
     * Extracts a portion of the Collection, returning a new Collection
     *
     * By default, preserves the keys.
     *
     * @link http://ca.php.net/array_slice
     *
     * @param int      $offset
     * @param int|null $limit
     * @param bool     $keys
     *
     * @return static
     */
    public function slice($offset, $limit = null, $keys = true)
    {
        return new static(\array_slice($this->items, $offset, $limit, $keys));
    }

    /**
     * Sum items in the collection, optionally matching the key / callable
     *
     * Based on Laravel: Illuminate\Support\Collection.sum
     *
     * @param null|string|callable $key
     *
     * @return mixed
     */
    public function sum($key = null)
    {
        $callback = $this->valueAccessor($key);

        return $this->reduce(function ($result, $item) use ($callback) {
            return $result + $callback($item);
        }, 0);
    }

    /**
     * Creates a new Collection containing the results of the callable in the same keys
     *
     * For example: with a collection of the same objects, call a method to export
     * part of each object into a new collection. Similar to using each() or walk()
     * except the callable should return the new value for the key.
     *
     * Note: this method preserves the array keys from the original Collection.
     *
     * @param callable $callable Receives: $value, $key
     *
     * @return static
     */
    public function transform(callable $callable)
    {
        $ret = new static();

        foreach ($this as $key => $value) {
            $ret->set($key, $callable($value, $key));
        }

        return $ret;
    }

    /**
     * Trims all values using trim(), returning a new Collection
     *
     * @return Collection
     */
    public function trim()
    {
        return $this->map('trim');
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
        $value = $this->get($key);

        if (!$value) {
            return $this->valueExecutor($default, $value, $key);
        }

        return $value;
    }

    /**
     * Returns the array values of the Collection as a new Collection
     *
     * @link http://ca.php.net/array_values
     *
     * @return static
     */
    public function values()
    {
        return new static(\array_values($this->items));
    }

    /**
     * Creates a new Collection containing only unique values
     *
     * @link http://ca.php.net/array_unique
     *
     * @param null|integer $type Sort flags
     *
     * @return static
     */
    public function unique($type = null)
    {
        return new static(\array_unique($this->items, $type));
    }

    /**
     * Returns a new collection will all values mapped to lower case
     *
     * @return Collection
     */
    public function upper()
    {
        return $this->map(function ($item) {
            return (function_exists('mb_strtoupper')) ? mb_strtoupper($item) : strtoupper($item);
        });
    }

    /**
     * Applies the callback to all elements in the Collection, returning a new Collection
     *
     * @link http://ca.php.net/array_walk
     *
     * @param callable $callback Receives: (&$value, $key, ?$userdata)
     * @param mixed    $userdata (optional) additional user data for the callback
     *
     * @return static
     */
    public function walk($callback, $userdata = null)
    {
        $elements = $this->items;
        \array_walk($elements, $callback, $userdata);

        return new static($elements);
    }



    /**
     * Providers a callable for fetching data from a collection item
     *
     * Based on Laravel: Illuminate\Support\Collection.valueRetriever
     *
     * @param string|callable $value
     * @param bool            $returnNull If true, returns null instead of the item
     *
     * @return callable
     */
    protected function valueAccessor($value, $returnNull = false)
    {
        if (Support::isCallable($value)) {
            return $value;
        }

        return function ($item) use ($value, $returnNull) {
            if (is_null($value)) {
                return $returnNull ? null : $item;
            }
            if (Support::isTraversable($item)) {
                return array_key_exists($value, $item) ? $item[$value] : null;
            }
            if (is_object($item) && isset($item->{$value})) {
                return $item->{$value};
            }
            if (is_object($item) && method_exists($item, $value)) {
                return $item->{$value}();
            }
            if (is_object($item) && method_exists($item, 'get' . ucwords($value))) {
                return $item->{'get' . ucwords($value)}();
            }

            return $returnNull ? null : $item;
        };
    }

    /**
     * If the value is a closure, executes it returning the value
     *
     * @param mixed $callable
     * @param mixed $value
     * @param mixed $key
     *
     * @return mixed
     */
    protected function valueExecutor($callable, $value, $key)
    {
        if (Support::isCallable($callable)) {
            return $callable($value, $key);
        }

        return $callable;
    }
}
