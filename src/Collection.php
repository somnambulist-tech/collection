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
     * Stores if set has changed
     *
     * @var boolean
     */
    protected $modified = false;

    /**
     * The set
     *
     * @var array
     */
    protected $set = [];
    
    
    
    /**
     * Constructor.
     *
     * @param array $array An array of data to set
     */
    public function __construct($array = [])
    {
        $this->set = self::convertToArray($array);
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
     * Implementation of __set_state to allow var_export set to be used
     *
     * @param array $array
     *
     * @return $this
     * @static
     */
    public static function __set_state($array)
    {
        $oObject = new static();
        $oObject->set($array['set']);
        $oObject->setModified($array['modified']);

        return $oObject;
    }

    /**
     * Returns an immutable collection of this set
     *
     * @return Immutable
     */
    public function freeze()
    {
        return new Immutable($this->set);
    }

    /**
     * Allows method names on sub-objects to be called on the Set
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
     * Resets the set
     *
     * @return void
     */
    public function reset()
    {
        $this->set = [];
        $this->setModified(false);
    }

    /**
     * Runs $method on all object instances in the set
     *
     * Invoke allows the same method to be called on all objects in the
     * current set. Useful for setting a specific value, or triggering
     * an update across multiple objects in one go. Only object values
     * are used.
     *
     * Optionally $arguments can be set and the method will be passed each
     * parameter as an argument.
     *
     * For more than 5 parameters, call_user_func_array is used.
     *
     * @param string $method    Name of the method to call
     * @param array  $arguments Parameter list to use when calling $method
     *
     * @return $this
     */
    public function invoke($method, array $arguments = array())
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
                            \call_user_func_array(array($value, $method), $arguments);
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Return an associative array of the stored data.
     *
     * @return array
     */
    public function toArray()
    {
        $array = [];

        foreach ($this->set as $key => $value) {
            if ($value instanceof Collection) {
                /* @var Collection $value */
                $array[$key] = $value->toArray();
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    }

    /**
     * Returns true if the set has been modified
     *
     * @return boolean
     */
    public function isModified()
    {
        return $this->modified;
    }

    /**
     * Sets the modification status of the set
     *
     * @param boolean $status
     *
     * @return Collection
     */
    public function setModified($status = true)
    {
        $this->modified = $status;

        return $this;
    }

    /**
     * Returns the number of items in the set
     *
     * @return integer
     */
    public function count()
    {
        return \count($this->set);
    }

    /**
     * @param string $offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return \array_key_exists($offset, $this->set);
    }

    /**
     * @param string $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        $value = $this->set[$offset];

        if (is_array($value)) {
            $value = new static($value);
        }

        return $value;
    }

    /**
     * @param string $offset
     * @param mixed  $value
     *
     * @return mixed
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset) && !$this->isValueInSet($value)) {
            $this->set[] = $value;
            $this->setModified();
        } else {
            if (!$this->offsetExists($offset)) {
                $this->set[$offset] = $value;
                $this->setModified();
            } else {
                if ($this->set[$offset] !== $value) {
                    $this->set[$offset] = $value;
                    $this->setModified();
                }
            }
        }
    }

    /**
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            $this->set[$offset] = null;
            $this->setModified();
            unset($this->set[$offset]);
        }
    }

    /**
     * Returns the iterable data
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->set);
    }

    /**
     * @link http://php.net/manual/en/serializable.serialize.php
     *
     * @return string
     */
    public function serialize()
    {
        return \serialize(['set' => $this->set, 'modified' => $this->isModified()]);
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
        if (is_array($data) && array_key_exists('set', $data) && array_key_exists('modified', $data)) {
            $this->set($data['set']);
            $this->setModified($data['modified']);
        }
    }

    /**
     * Returns true if value is in the set
     *
     * @link http://ca.php.net/in_array
     *
     * @param mixed $value
     *
     * @return boolean
     */
    public function isValueInSet($value)
    {
        return \in_array($value, $this->set, (is_scalar($value) ? false : true));
    }

    /**
     * Appends the array or set object to this set, without reindexing the keys
     *
     * This is the equivalent of $array + $array.
     *
     * @link http://ca.php.net/array_merge
     *
     * @param mixed $array either array, ArrayObject or BaseSet
     *
     * @return $this
     */
    public function append($array)
    {
        if ($array instanceof Collection) {
            /* @var Collection $array */
            $array = $array->toArray();
        } elseif ($array instanceof \ArrayObject) {
            $array = (array)$array;
        } elseif (!\is_array($array)) {
            $array = array($array);
        }

        $this->set = $this->set + $array;
        $this->setModified();

        return $this;
    }

    /**
     * Filters the set through $callback returning a new set
     *
     * @link http://ca.php.net/array_filter
     *
     * @param mixed $callback PHP callable, closure or function
     * @param int   $flag     Flag to control values passed to callback function
     *
     * @return $this
     */
    public function filter($callback = null, $flag = 0)
    {
        return new static(\array_filter($this->set, $callback), $flag);
    }

    /**
     * Synonym for {@link search()}
     *
     * Searches the Set for $value returning the corresponding key where the
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
     * Find a key(s) using a regular expression, always returns a new Set
     *
     * Similar to {@link keys} but allows any PERL regular expression to be
     * used for locating a matching key. Returns a new Set containing matching
     * keys and values.
     *
     * @param string $regex PERL regular expression
     *
     * @return Collection
     */
    public function findByRegex($regex)
    {
        /* @var Collection $oSet */
        $oSet = new static();
        foreach ($this as $key => $value) {
            if (\preg_match($regex, $key)) {
                $oSet[$key] = $value;
            }
        }

        return $oSet;
    }

    /**
     * Returns a new set with all sub-sets / arrays merged into one set
     *
     * If similar keys exist, they will be overwritten. This method is
     * intended to convert a multi-dimensional array into a key => value
     * array. This method is called recursively through the set.
     *
     * @return Collection
     */
    public function flatten()
    {
        /* @var Collection $oSet */
        $oSet = new static();
        foreach ($this as $key => $value) {
            if (is_array($value) || $value instanceof Collection) {
                $oSet->merge($this->_flatten($value));
            } else {
                $oSet[$key] = $value;
            }
        }

        return $oSet;
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
                /* @var Collection $oSet */
                $return = \array_merge($return, $this->_flatten($value->all()));
            } else {
                $return[$key] = $value;
            }
        }

        return $return;
    }

    /**
     * Exchange all values for keys and return new Set
     *
     * Note: this should only be used with elements that can be used as valid
     * PHP array keys.
     *
     * @link http://ca.php.net/array_flip
     *
     * @return Collection
     */
    public function flip()
    {
        return new static(array_flip($this->set));
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
     * @return Collection
     */
    public function keys($search = null, $strict = null)
    {
        /* @var Collection $oSet */
        $oSet = new static();

        if (null === $search && null === $strict) {
            $keys = \array_keys($this->set);
        } elseif (null !== $search && null === $strict) {
            $keys = \array_keys($this->set, $search);
        } else {
            $keys = \array_keys($this->set, $search, $strict);
        }

        $oSet->set($keys);

        return $oSet;
    }

    /**
     * Runs the function $callback across the current set
     *
     * @link http://ca.php.net/array_map
     *
     * @param callable $callback
     *
     * @return Collection
     */
    public function map($callback)
    {
        return new static(\array_map($callback, $this->set));
    }

    /**
     * Merges the supplied array into the current set
     *
     * Note: should only be used with sets of the same data, may cause strange results.
     * This method will re-index keys and overwrite existing values. If you wish to
     * preserve keys and values see {@link append}.
     *
     * @link http://ca.php.net/array_merge
     *
     * @param mixed $array either array, ArrayObject, or BaseSet
     *
     * @return Collection
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

        $this->set = \array_merge($this->set, $array);
        $this->setModified();

        return $this;
    }

    /**
     * Pads the set to size using value as the value of the new elements
     *
     * @link http://ca.php.net/array_pad
     *
     * @param integer $size
     * @param mixed   $value
     *
     * @return Collection
     */
    public function pad($size, $value)
    {
        $this->set = \array_pad($this->set, $size, $value);
        $this->setModified();

        return $this;
    }

    /**
     * Reduces the Set to a single value, returning it, or $initial if no value
     *
     * @link http://ca.php.net/array_reduce
     *
     * @param callable $callback
     * @param mixed    $initial (optional) Default value to return if no result
     *
     * @return mixed
     */
    public function reduce($callback, $initial = null)
    {
        return \array_reduce($this->set, $callback, $initial);
    }

    /**
     * Reverses the data in the set maintaining any keys
     *
     * @link http://ca.php.net/array_reverse
     * @return Collection
     */
    public function reverse()
    {
        $this->set = \array_reverse($this->set, true);
        $this->setModified();

        return $this;
    }

    /**
     * Searches the set via {@link http://ca.php.net/array_search array_search}
     *
     * Searches the Set for an item returning the corresponding key where the
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
        return \array_search($value, $this->set, (\is_object($value) ? true : null));
    }

    /**
     * Sort the set by a user defined function
     *
     * @link http://ca.php.net/usort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return Collection
     */
    public function sortUsing($callable)
    {
        \usort($this->set, $callable);
        $this->setModified();

        return $this;
    }

    /**
     * Sort the set by a user defined function
     *
     * @link http://ca.php.net/usort
     *
     * @param mixed $callable Any valid PHP callable e.g. function, closure, method
     *
     * @return Collection
     */
    public function sortKeepingKeysUsing($callable)
    {
        \uasort($this->set, $callable);
        $this->setModified();

        return $this;
    }

    /**
     * Sorts the set by value using asort preserving keys, returns the Set
     *
     * @link http://ca.php.net/asort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return Collection
     */
    public function sortByValue($type = SORT_STRING)
    {
        \asort($this->set, $type);
        $this->setModified();

        return $this;
    }

    /**
     * Sorts the set by value using arsort preserving keys, returns the Set
     *
     * @link http://ca.php.net/arsort
     *
     * @param integer $type Any valid SORT_ constant
     *
     * @return Collection
     */
    public function sortByValueReversed($type = SORT_STRING)
    {
        \arsort($this->set, $type);
        $this->setModified();

        return $this;
    }

    /**
     * Sort the set by designated keys
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByKey($type = null)
    {
        \ksort($this->set, $type);
        $this->setModified();

        return $this;
    }

    /**
     * Sort the set by designated keys in reverse order
     *
     * @param null|integer $type Any valid SORT_ constant
     *
     * @return $this
     */
    public function sortByKeyReversed($type = null)
    {
        \krsort($this->set, $type);
        $this->setModified();

        return $this;
    }

    /**
     * Returns the array values of the set as a new Set
     *
     * @link http://ca.php.net/array_values
     * @return Collection
     */
    public function values()
    {
        return new static(\array_values($this->set));
    }

    /**
     * Creates a new set containing only unique values
     *
     * @param null|integer $type Sort flags
     *
     * @link http://ca.php.net/array_unique
     * @return $this
     */
    public function unique($type = null)
    {
        return new static(\array_unique($this->set, $type));
    }

    /**
     * Applies the callback to all elements in the Set, returning a new Set
     *
     * @link http://ca.php.net/array_walk
     *
     * @param callable $callback
     * @param mixed    $userdata (optional) additional user data for the callback
     *
     * @return $this
     */
    public function walk($callback, $userdata = null)
    {
        $elements = $this->set;
        \array_walk($elements, $callback, $userdata);

        return new static($elements);
    }

    /**
     * Returns all items in the set
     *
     * @return array
     */
    public function all()
    {
        return $this->set;
    }

    /**
     * Returns the item from the set, null if not found
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
     * Returns true if the specified key exists in the Set
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
     * Returns true if the specified key exists in the Set and is not empty
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
     * Alias of isValueInSet
     *
     * @param mixed $value
     *
     * @return boolean
     */
    public function contains($value)
    {
        return $this->isValueInSet($value);
    }

    /**
     * Adds an item to the set if it does not already exist
     *
     * This is the same as getting the instance of Set and using it as an array:
     * <code>
     * $oSet = new Scorpio\Component\Base\Set();
     * $oSet->add('value1');
     * // is the same as:
     * $oSet[] = 'value1';
     * </code>
     *
     * @param mixed $value
     *
     * @return Collection
     */
    public function add($value)
    {
        $this->offsetSet(null, $value);

        return $this;
    }

    /**
     * Adds the value if it does not already exist in the set
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function addIfNotInSet($value)
    {
        if (!$this->contains($value)) {
            $this->add($value);
        }

        return $this;
    }

    /**
     * Sets the items value
     *
     * If item is an array and value is null, the set will be replaced with
     * the items and marked as modified.
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return Collection
     */
    public function set($key, $value = null)
    {
        if (\is_array($key) && $value === null) {
            $this->set = $key;
            $this->setModified();
        } else {
            $this->offsetSet($key, $value);
        }

        return $this;
    }

    /**
     * Removes the key from the set
     *
     * @param mixed $key
     *
     * @return Collection
     */
    public function remove($key)
    {
        $this->offsetUnset($key);

        return $this;
    }

    /**
     * Removes $value from the set
     *
     * @param mixed $value
     *
     * @return Collection
     */
    public function removeElement($value)
    {
        if (false !== $key = $this->search($value)) {
            $this->remove($key);
        }

        return $this;
    }

    /**
     * Returns the first element of the Set
     *
     * @return mixed
     */
    public function first()
    {
        return reset($this->set);
    }

    /**
     * Returns the last element of the Set
     *
     * @return mixed
     */
    public function last()
    {
        return end($this->set);
    }

    /**
     * @param null|string $glue
     *
     * @return string
     */
    public function implode($glue = null)
    {
        return implode($glue, $this->set);
    }

    /**
     * @param null|string $glue
     *
     * @return string
     */
    public function implodeKeys($glue = null)
    {
        return implode($glue, $this->keys()->toArray());
    }
}
