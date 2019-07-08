## Collection Library

Provides a Collection container with no dependencies on any framework code. The collection is a
wrapper around a standard array with many helper methods. It sits somewhere between a Laravel
Collection and the Doctrine ArrayCollection and takes ideas from both of those as well as others.

If you see something missing or have suggestions for other methods, submit a PR or ticket.

### Requirements

 * PHP 7.2+

### Installation

Install using composer, or checkout / pull the files from github.com.

 * composer require somnambulist/collection

### Collection Types

There are several types of collection that all implement the Collection interface:

 * SimpleCollection
 * MutableCollection
 * FrozenCollection
 * MutableSet
 * FrozenSet

### Using

Instantiate with an array or other collection of items:

```php
$collection = Collection::collect($items);
$collection->map()->filter()...
```

Freeze changes to a collection:

```php
$locked = $collection->freeze()

// raises exception
$locked->shift()
```

#### Dot Access

From version 2.1 dot notation can now be used directly with the Collection for both `get()` and `extract()`
calls. For example: `users.*.name` would fetch the name from all elements in the users key space. Dot access
can call into:

 * arrays
 * Collections
 * public object properties
 * object return methods e.g.: `name` would be translated to `name()`
 * object `get` methods e.g: `name` would be translated to `getName()`
 
A default can be supplied with `get()` that if the specified key does not exist, it will be used instead.
The default can be a closure. Note: that this will be called for all elements e.g: `users.*.age` with a
default that returned `0`, would return 0 for all matching users without an age present.

Key walking is implemented in a standalone class allowing it to be re-used in other classes. This functionality
is based on Laravel's `data_get()` and `Arr::pluck()`, modified to support getter methods and default handling
when extracting from objects.

To access elements that use dot notation for keys, either:

 * access the collection using array access notation e.g. `$col['the.key.name']`
 * prefix the key with an `@` sign

#### Other Usages

The Collection can be serialized - provided the items within it support serializing.

The Collection implements `__set_state()` so can be used with var_export() e.g.: if caching to files.

The Collection supports object access, array access and iteration.

The Collection supports `__call()` that proxies through to invoke() allowing methods to be called on all object items.

Nested arrays are automatically converted to new Collections when accessed.

#### Other Notes

This Collection does not allow adding duplicate values in the Collection. They can be set
on create, but calls to `add()` or `offsetSet()` will ignore the value.

As of 2.2.0 an interface has been added `ExportableInterface` allowing `toArray` to cascade transform
sub-objects contained within a Collection.

### Available Methods

#### Factory Methods

 * `collect()` create a new Collection statically
 * `collectionFromIniString()` create a Collection from an ini style string
 * `collectionFromString()` split an encoded string into a Collection
 * `collectionFromUrl()` given a URL returns a Collection after using `parse_url()`
 * `collectionFromUrlQuery()` converts a URL query string to a Collection using `parse_str()`
 * `convertToArray()` attempts to convert the variable to an array
 * `explode()` explode a string into a Collection

#### Operator Methods

 * `add()` add a value (auto-key), only if it does not exist
 * `all()` returns the underlying array
 * `append()` adds the values to the end of the Collection
 * `assert()` returns true if all elements pass the test, false on first failure
 * `call()` alias of transform()
 * `contains()` does the collection have the value
 * `count()` returns the number of items in the Collection
 * `diff()` returns the items not present in the past collection of items
 * `diffKeys()` returns the keys not present in the past collection of items
 * `each()` applies the callback to all items in the set; if the callback fails stops iterating
 * `except()` filters out the specified keys, returning a new Collection
 * `extract()` returns a Collection containing the values of the specified field, optionally indexed by another field
 * `filter()` filter the Collection by a callback, receives value and key
 * `fill()` create a Collection filled with a value
 * `fillKeysWith()` create a new Collection using the values as keys, and assign the passed var as the key value
 * `find()` synonym of search, find the key a value has
 * `first()` returns the first item
 * `flatten()` returns a 2 dimensional Collection of key => values
 * `flip()` exchange keys for values
 * `freeze()` convert the Collection to an Immutable collection
 * `get()` return the value with key, or the default if not found. Default can be a closure
 * `getIterator()` returns an ArrayIterator
 * `has()` returns true if the key exists in the Collection
 * `hasValueForKey()` returns true if the key exists and the value is not empty
 * `implode()` join values together with the glue string
 * `implodeKeys()` join the keys together with the glue string
 * `intersect()` returns a Collection of items that exist in the past items
 * `invoke()` call a method on all objects in the Collection
 * `keys()` returns all the keys in a new Collection
 * `last()` returns the last item
 * `lower()` converts all values to lowercase, returns a new Collection
 * `map()` applies a callback to all items, returning a new Collection
 * `match()` find keys and values where the key matches the regex
 * `max()` find the largest value in the collection (optionally by key/callable)
 * `min()` find the smallest value in the collection (optionally by key/callable)
 * `merge()` combine items into the current Collection, replaces existing keys items
 * `only()` returns only these keys in a new Collection
 * `pad()` pad the Collection to a size
 * `pipe()` pass the collection to the callable
 * `pipeline()` transform a Collection of items through a collection of Operators, similar to a pipeline
 * `pop()` removes an item from the end of the Collection
 * `reduce()` applies a callback to the Collection to produce a single value
 * `remove()` removes the key
 * `removeElement()` removes the value
 * `removeEmpty()` remove the values considered to be "empty", default: false, null and empty string
 * `removeNulls()` remove all actual null values (`is_null($value)` is true)
 * `reset()` clears all items from the Collection
 * `reverse()` reverses the data maintaining key association
 * `search()` finds the key for an item in the Collection
 * `shift()` shift an item from the beginning of the Collection
 * `shuffle()` shuffles the items in the Collection
 * `slice()` extract a portion of the Collection
 * `sortByKey()` sort the Collection by the keys
 * `sortByKeyReversed()` sort the keys in reverse order
 * `sortByValue()` sort the Collection byt the values, preserves key association
 * `sortByValueReversed()` sort in reverse order by valuem preserving key association
 * `sortKeepingKeysUsing()` apply a callback to sort the Collection, preserving keys
 * `sortUsing()` apply a callback to sort the Collection, creates new keys
 * `sum()` sum values in collection, optionally by key or callable
 * `toArray()` convert to an array, cascades through values casting sub-Collections to array
 * `toQueryString()` convert to a HTTP query string, casts all elements to array first
 * `toJson()` convert to a JSON string, uses toArray() internally
 * `transform()` applies the callback to all items returning a new Collection with the same keys and the values from the callback
 * `trim()` remove whitespace surrounding all values
 * `unique()` creates a new Collection containing only unique values
 * `upper()` converts all values to uppercase, returns a new Collection
 * `value()` similar to get() except returns the default if the returned value is empty
 * `values()` returns a new Collection containing just the values

### Deprecated Methods
 
 * append() is now union(); append() adds elements to the array without keys
 * invoke() use run()
 * removeElement() use remove()
 * transform() use map()
 * find() returns the first match from a filter() and NOT a key
 * pipe() was renamed to pipeline()
 * using invoke() (run()) now uses the splat operator so arguments should be passed as separate args not as an array
 * using remove() to remove keys, use unset()

#### Removed from v3

 * __call() has been removed as it masks method errors
 * call() use map()
 * implodeKeys() use keys()->implode()
 * search() use filter() or keys()
 * walk() use map()
 * using set() to replace the Collection has been removed

#### Removed from v2

 * isValueInSet() use contains()
 * addIfNotInSet() use add()
 * findByRegex() use match()
 * isModified() - removed from v2
