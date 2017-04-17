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

/**
 * Class Collection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\Collection
 * @author     Dave Redfern
 */
class Collection implements \ArrayAccess, \Countable, \IteratorAggregate, \Serializable
{

    /**
     * Stores if Collection has changed
     *
     * @var boolean
     */
    protected $modified = false;

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
        $this->items = self::convertToArray($items);
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
     * Creates a new collection by exploding the string using delimiter
     *
     * @link http://ca.php.net/explode
     *
     * @param string $string
     * @param string $delimiter
     *
     * @return static
     */
    public static function explode($string, $delimiter)
    {
        return new static(explode($delimiter, $string));
    }

    /**
     * Creates a new collection for a string that describes key values
     *
     * E.g.: a URL query string: var=value&var2=value2
     * E.g.: a pipe delimited string: op|op2:2,3|another:true
     *
     * @param string $string
     * @param string $separator  String that separates parameters
     * @param string $assignment String that signifies value assignment (if missing is true)
     * @param string $options    String for multiple items per assignment
     *
     * @return static
     */
    public static function collectionFromString($string, $separator = '&', $assignment = '=', $options = ',') {
        $collection = [];

        if ( strlen(trim($string)) > 0 ) {
            static::explode($string, $separator)
                ->each(function ($item) use ($assignment, $options, &$collection) {
                    if (false === strpos($item, $assignment)) {
                        $collection[trim($item)] = true;
                        return;
                    }

                    list($key, $value) = explode($assignment, $item);

                    if (false !== strpos($value, $options)) {
                        $value = static::explode($value, $options)->trim()->toArray();
                    }

                    $collection[trim($key)] = $value;
                })
            ;
        }

        return new static($collection);
    }

    /**
     * Ensures passed var is an array
     *
     * @param mixed   $var
     * @param boolean $deep
     *
     * @return array
     */
    public static function convertToArray($var, $deep = false)
    {
        if (null === $var) {
            return [];
        }
        if (is_scalar($var)) {
            return [$var];
        }
        if (is_object($var)) {
            if ($var instanceof \stdClass) {
                $var = (array)$var;
            } elseif ($var instanceof \Iterator) { // @codeCoverageIgnore
                $var = iterator_to_array($var);
            } elseif ($var instanceof \ArrayObject) { // @codeCoverageIgnore
                $var = $var->getArrayCopy();
            } elseif (method_exists($var, 'toArray')) {
                $var = $var->toArray();
            } elseif (method_exists($var, 'asArray')) {
                $var = $var->asArray();
            } elseif (method_exists($var, 'toJson')) {
                $var = json_decode($var->toJson(), true);
            } elseif (method_exists($var, 'asJson')) {
                $var = json_decode($var->asJson(), true);
            }

            return $var;
        }
        if (is_array($var)) {
            if ($deep) {
                foreach ($var as &$item) {
                    $item = static::convertToArray($item, true);
                }
            }

            return $var;
        } else {
            return [$var]; // @codeCoverageIgnore
        }
    }

    /**
     * Implementation of __set_state to allow var_export Collection to be used
     *
     * @param array $array
     *
     * @return $this
     * @static
     */
    public static function __set_state($array)
    {
        $oObject = new static();
        $oObject->items    = $array['items'];
        $oObject->modified = $array['modified'];

        return $oObject;
    }

    /**
     * Allows method names on sub-objects to be called on the Collection
     *
     * Calls into {@link invoke} to actually run the method.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return $this
     */
    public function __call($name, $arguments)
    {
        return $this->invoke($name, $arguments);
    }

    /**
     * Returns true if property exists (array key)
     *
     * @param string $name
     *
     * @return boolean
     */
    public function __isset($name)
    {
        return $this->offsetExists($name);
    }

    /**
     * Returns the property matching $name
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    /**
     * Set a property $name to $value
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return $this
     */
    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);

        return $this;
    }

    /**
     * Removes property $name
     *
     * @param string $name
     */
    public function __unset($name)
    {
        $this->offsetUnset($name);
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
     * @param string $offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return \array_key_exists($offset, $this->items);
    }

    /**
     * @param string $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        $value = $this->items[$offset];

        if (is_array($value)) {
            $value = new static($value);
        }

        return $value;
    }

    /**
     * @param string $offset
     * @param mixed  $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            if (!$this->contains($value)) {
                $this->items[] = $value;
                $this->setModified();
            }
        } else {
            $this->items[$offset] = $value;
            $this->setModified();
        }
    }

    /**
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            $this->items[$offset] = null;
            $this->setModified();
            unset($this->items[$offset]);
        }
    }

    /**
     * @link http://php.net/manual/en/serializable.serialize.php
     *
     * @return string
     */
    public function serialize()
    {
        return \serialize(['items' => $this->items, 'modified' => $this->isModified()]);
    }

    /**
     * @link http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized
     *
     * @return void
     */
    public function unserialize($serialized)
    {
        $data = \unserialize($serialized);
        if (is_array($data) && array_key_exists('items', $data) && array_key_exists('modified', $data)) {
            $this->items    = $data['items'];
            $this->modified = $data['modified'];
        }
    }



    /**
     * Returns true if the Collection has been modified
     *
     * @return boolean
     */
    public function isModified()
    {
        return $this->modified;
    }

    /**
     * Sets the modification status of the Collection
     *
     * @param boolean $status
     *
     * @return $this
     */
    public function setModified($status = true)
    {
        $this->modified = $status;

        return $this;
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
        if ($array instanceof Collection) {
            $array = $array->toArray();
        } elseif ($array instanceof \ArrayObject) {
            $array = (array)$array;
        } elseif (!\is_array($array)) {
            $array = [$array];
        }

        $this->items = $this->items + $array;
        $this->setModified();

        return $this;
    }

    /**
     * Creates a new Collection containing the results of the callable in the same keys
     *
     * For example: with a collection of the same objects, call a method to export
     * part of each object into a new collection. Similar to using each() or walk()
     * except the callable should return the new value for the key.
     *
     * @param callable $callable Receives: $value, $key
     *
     * @return static
     */
    public function call(callable $callable)
    {
        $ret = new static();

        foreach ($this as $key => $value) {
            $ret->set($key, $callable($value, $key));
        }

        $ret->setModified(false);

        return $ret;
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
    public function contains($value)
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
        return new static(array_diff($this->items, static::convertToArray($items)));
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
        return new static(array_diff_key($this->items, static::convertToArray($items)));
    }

    /**
     * Alias of walk, applies the callback to all items, returns a new Collection
     *
     * @param callable $callable Receives: (&$value, $key)
     *
     * @return static
     */
    public function each(callable $callable)
    {
        return $this->walk($callable);
    }

    /**
     * Get all items except for those with the specified keys.
     *
     * @param mixed $ignore
     *
     * @return static
     */
    public function except($ignore)
    {
        $ignore = is_array($ignore) ? $ignore : func_get_args();

        return $this->filter(function ($key) use ($ignore) {
            return !in_array($key, $ignore);
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * Filters the Collection through callback returning a new Collection
     *
     * @link http://ca.php.net/array_filter
     *
     * @param mixed $callback PHP callable, closure or function
     * @param int   $flag     Flag to control values passed to callback function
     *
     * @return static
     */
    public function filter($callback = null, $flag = 0)
    {
        return new static(\array_filter($this->items, $callback, $flag));
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
                $col->merge($this->_flatten($value));
            } else {
                $col[$key] = $value;
            }
        }

        return $col;
    }

    /**
     * Internal function that converts the passed value to an array
     *
     * @param array|Collection $var
     *
     * @return array
     */
    protected function _flatten($var)
    {
        $return = [];

        foreach ($var as $key => $value) {
            if (is_array($value)) {
                $return = \array_merge($return, $this->_flatten($value));
            } elseif ($value instanceof Collection) {
                $return = \array_merge($return, $this->_flatten($value->all()));
            } else {
                $return[$key] = $value;
            }
        }

        return $return;
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
        if ($this->has($key)) {
            return $this->offsetGet($key);
        } else {
            if ($default instanceof \Closure) {
                return $default();
            }

            return $default;
        }
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
        return new static(array_intersect($this->items, static::convertToArray($items)));
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
                        case 0: $value->{$method}(); break;
                        case 1: $value->{$method}($arguments[0]); break;
                        case 2: $value->{$method}($arguments[0], $arguments[1]); break;
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
        if ($array instanceof Collection) {
            $array = $array->toArray();
        } elseif ($array instanceof \ArrayObject) {
            $array = (array)$array;
        } elseif (!\is_array($array)) {
            $array = array($array);
        }

        $this->items = \array_merge($this->items, $array);
        $this->setModified();

        return $this;
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
        $this->setModified();

        return $this;
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
     * @param mixed    $initial (optional) Default value to return if no result
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
        $this->setModified(false);
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
        $this->setModified();

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
     * the items and marked as modified.
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
            $this->setModified();
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
     * Sort the Collection by a user defined function
     *
     * @link http://ca.php.net/usort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return $this
     */
    public function sortUsing($callable)
    {
        \usort($this->items, $callable);
        $this->setModified();

        return $this;
    }

    /**
     * Sort the Collection by a user defined function
     *
     * @link http://ca.php.net/uasort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return $this
     */
    public function sortKeepingKeysUsing($callable)
    {
        \uasort($this->items, $callable);
        $this->setModified();

        return $this;
    }

    /**
     * Sorts the Collection by value using asort preserving keys, returns the Collection
     *
     * @link http://ca.php.net/asort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByValue($type = SORT_STRING)
    {
        \asort($this->items, $type);
        $this->setModified();

        return $this;
    }

    /**
     * Sorts the Collection by value using arsort preserving keys, returns the Collection
     *
     * @link http://ca.php.net/arsort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByValueReversed($type = SORT_STRING)
    {
        \arsort($this->items, $type);
        $this->setModified();

        return $this;
    }

    /**
     * Sort the Collection by designated keys
     *
     * @link http://ca.php.net/ksort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByKey($type = null)
    {
        \ksort($this->items, $type);
        $this->setModified();

        return $this;
    }

    /**
     * Sort the Collection by designated keys in reverse order
     *
     * @link http://ca.php.net/krsort
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByKeyReversed($type = null)
    {
        \krsort($this->items, $type);
        $this->setModified();

        return $this;
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
     * Return an associative array of the stored data.
     *
     * @return array
     */
    public function toArray()
    {
        $array = [];

        foreach ($this->items as $key => $value) {
            if ($value instanceof Collection) {
                $array[$key] = $value->toArray();
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    }

    /**
     * Returns a JSON encoded string of all items in the Collection
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
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
     * Returns the array values of the Collection as a new Collection
     *
     * @link http://ca.php.net/array_values
     * @return static
     */
    public function values()
    {
        return new static(\array_values($this->items));
    }

    /**
     * Creates a new Collection containing only unique values
     *
     * @param null|integer $type Sort flags
     *
     * @link http://ca.php.net/array_unique
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
     * Synonym for contains()
     *
     * @param mixed $value
     *
     * @return boolean
     * @deprecated Use contains()s
     */
    public function isValueInSet($value)
    {
        return \in_array($value, $this->items, (is_scalar($value) ? false : true));
    }

    /**
     * Adds the value if it does not already exist in the Collection
     *
     * @param mixed $value
     *
     * @return $this
     * @deprecated use add()
     */
    public function addIfNotInSet($value)
    {
        if (!$this->contains($value)) {
            $this->add($value);
        }

        return $this;
    }

    /**
     * Synonym for match()
     *
     * @param string $regex PERL regular expression
     *
     * @return static
     * @deprecated use match()
     */
    public function findByRegex($regex)
    {
        return $this->match($regex);
    }



    /**
     * Providers a callable for fetching data from a collection item
     *
     * Based on Laravel: Illuminate\Support\Collection.valueRetriever
     *
     * @param string|callable $value
     *
     * @return callable
     */
    protected function valueAccessor($value)
    {
        if ($this->isCallable($value)) {
            return $value;
        }

        return function ($item) use ($value) {
            if (is_null($value)) {
                return $item;
            }

            if ($this->isTraversable($item)) {
                return array_key_exists($value, $item) ? $item[$value] : null;
            }

            return $item;
        };
    }

    /**
     * Returns true if value is callable, but not a string callable
     *
     * Based on Laravel: Illuminate\Support\Collection.useAsCallable
     *
     * @param  mixed  $value
     * @return bool
     */
    protected function isCallable($value)
    {
        return !is_string($value) && is_callable($value);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    protected function isTraversable($value)
    {
        return is_array($value) || $value instanceof \ArrayAccess;
    }
}
