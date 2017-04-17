## Collection Library

Provides a Collection container with no dependencies on any framework code. The collection is a
wrapper around a standard array with many helper methods. It sits somewhere between a Laravel
Collection and the Doctrine ArrayCollection and takes ideas from both of those as well as others.

If you see something missing or have suggestions for other methods, submit a PR or ticket.

### Requirements

 * PHP 5.6+

### Installation

Install using composer, or checkout / pull the files from github.com.

 * composer require somnambulist/collection

### Collection Types

There is a single collection implementation with an extended version providing an immutable
collection i.e.: once created you cannot change the collection. You can still change the
contents if they are objects, but the number of items is fixed.

### Using

Instantiate with an array or other collection of items:

    $collection = Collection::collect($items);
    $collection->map()->filter()...
    
Freeze changes to a collection:

    $locked = $collection->freeze()
    
    // raises exception
    $locked->shift()

#### Other Usages

The Collection can be serialized - provided the items within it support serializing.

The Collection implements __set_state() so can be used with var_export() e.g.: if caching to files.

The Collection supports array access and iteration.

The Collection supports __call() that proxies through to invoke() allowing methods to be called on all object items.

The Collection maintains an internal "dirty" flag that is changed when the collection is modified.

Nested arrays are automatically converted to new Collections when accessed.

#### Other Notes

This Collection does not allow adding duplicate values to the Collection. They can be set
on create, but calls to add() or offsetSet() will ignore the value.

### Available Methods

#### Static Methods

 * collect() create a new Collection statically
 * collectionFromString() split an encoded string into a Collection
 * convertToArray() attempts to convert the variable to an array
 * explode() explode a string into a Collection

#### Operator Methods

 * add() add a value (auto-key), only if it does not exist
 * all() returns the underlying array
 * append() adds the values to the end of the Collection
 * call() applies the callback to all items returning a new Collection with the same keys and the values from the callback
 * contains() does the collection have the value
 * count() returns the number of items in the Collection
 * diff() returns the items not present in the past collection of items
 * diffKeys() returns the keys not present in the past collection of items
 * each() synonym of walk() apply a callback to each item (by reference), returns a new Collection
 * except() filters out the specified keys, returning a new Collection
 * filter() filter the Collection by a callback
 * fill() create a Collection filled with a value
 * fillKeysWith() create a new Collection using the values as keys, and assign the passed var as the key value
 * find() synonym of search, find the key a value has
 * first() returns the first item
 * flatten() returns a 2 dimensional Collection of key => values
 * flip() exchange keys for values
 * freeze() convert the Collection to an Immutable collection
 * get() return the value with key, or the default if not found. Default can be a closure
 * getIterator() returns an ArrayIterator
 * has() returns true if the key exists in the Collection
 * hasValueForKey() returns true if the key exists and the value is not empty
 * implode() join values together with the glue string
 * implodeKeys() join the keys together with the glue string
 * intersect() returns a Collection of items that exist in the past items
 * invoke() call a method on all objects in the Collection
 * isModified() has the Collection been modified since instantiation
 * keys() returns all the keys in a new Collection
 * last() returns the last item
 * lower() converts all values to lowercase, returns a new Collection
 * map() applies a callback to all items, returning a new Collection
 * match() find keys and values where the key matches the regex
 * max() find the largest value in the collection (optionally by key/callable)
 * min() find the smallest value in the collection (optionally by key/callable)
 * merge() combine items into the current Collection, replaces existing keys items
 * pad() pad the Collection to a size
 * pop() removes an item from the end of the Collection
 * reduce() applies a callback to the Collection to produce a single value
 * remove() removes the key
 * removeElement() removes the value
 * reset() clears all items from the Collection
 * reverse() reverses the data maintaining key association
 * search() finds the key for an item in the Collection
 * shift() shift an item from the beginning of the Collection
 * slice() extract a portion of the Collection
 * sortByKey() sort the Collection by the keys
 * sortByKeyReversed() sort the keys in reverse order
 * sortByValue() sort the Collection byt the values, preserves key association
 * sortByValueReversed() sort in reverse order by valuem preserving key association
 * sortKeepingKeysUsing() apply a callback to sort the Collection, preserving keys
 * sortUsing() apply a callback to sort the Collection, creates new keys
 * sum() sum values in collection, optionally by key or callable
 * toArray() convert to an array, cascades through values casting sub-Collections to array
 * toJson() convert to a JSON string, uses toArray() internally
 * trim() remove whitespace surrounding all values
 * unique() creates a new Collection containing only unique values
 * upper() converts all values to uppercase, returns a new Collection
 * values() returns a new Collection containing just the values
 * walk() applies a callback to each item, returns a new Collection (uses array_walk)

### Deprecated Methods

 * isValueInSet() use contains()
 * addIfNotInSet() use add()
 * findByRegex() use match()