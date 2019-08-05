# Somnambulist Collection Library

Somnambulist Collection provides a framework for making collections and pseudo sets of your own.
It has been completely re-worked from the previous versions into a set of behaviours (traits) and
some common interfaces grouped around function.

The basic "Collection" is an interface that extends ArrayAccess, IteratorAggregate and Countable;
and adds Arrayable and Jsonable as common requirements. Then the basic methods are:

```php
public function all(): array;
public function contains($value): bool;
public function doesNotContain($value): bool;
public function each(callable $callback);
public function filter($criteria = null);
public function first();
public function get($key, $default = null);
public function has(...$key): bool;
public function keys($search = null);
public function last();
public function map(callable $callable);
public function value($key, $default = null);
public function values();
```

From this, additional functionality is added by interface and traits - or implement your own.
The goal is to allow for a set of small, re-usable, well tested functions that can be combined
to provide the functionality you need, instead of a single monolithic collection class that
does everything and more.

Of course out of the box, several standard implementations are included.

This is heavily inspired by Doctrine ArrayCollection and of course Laravel Collection along
with ideas from Lithium framework, ez Components, CakePHP and more.

If you see something missing or have suggestions for other methods, submit a PR or ticket!
Adding functions is easy with the trait system and if you think that the groupings need work,
suggest a better name!

__Note:__ there are substantial differences between v2 and v3. In fact the changes are so large
that a drop-in replacement is unlikely to work. Be sure to read the notes about what has
changed.

## Requirements

 * PHP 7.2+
 * ext-json for JSON export

## Installation

Install using composer, or checkout / pull the files from github.com.

 * composer require somnambulist/collection

## Contributing

Contributions are more than welcome! Whether doc improvements, new methods or bug fixes.
In all cases, fork the repository, make a branch then submit a PR - the usual GitHub flow.

Please bare in mind the following:

 * the minimum version of PHP is 7.2
 * traits should not specify a return type but must include a docblock return type
 * return types for the Collection must be `static` to allow runtime resolution
 * all trait methods must have docblocks - these are converted to docs
 * if a trait uses code from elsewhere, it should be attributed whenever possible
 * consider the type of operation and if it will work in a Set or a Frozen collection
 * tests should be included

Remember that the Collection could be a Set or Frozen, so often it is necessary to operate
on the values and then create a new collection after processing. See the current implementations
for examples.

## Important BC Breaks with 2.2

### Value conversion to collections on create

The level of conversion attempted when creating a collection with value (`Collection::collect`)
has changed. Previously toJson / asJson would be called, converting anything with those to
arrays. These methods are no longer called and the objects will be preserved. This is to prevent
Model objects having attributes extracted, or potentially expensive serialization processed
being triggered.

Additionally: performing a recursive, `deep`, conversion has been removed. Now only the top 
level item will be converted to an array and any nested items will be left alone.

### MutableSet enforces unique values

Previously the v2 collection was a mix of set and collection in that you can create it with
the same value, but could not add the same value multiple times - unless using merge, append
or other creative ways of joining data together.

With V3 this distinction is now made clear with both a MutableCollection AND a MutableSet. Now
the MutableSet _does_ enforce value uniqueness and this extends to: merge, combine, union,
append, prepend and in fact any attempt to mutate the set where you can add values. Attempting
to add duplicate values raises an exception, instead of doing nothing.  

The MutableCollection _does_ allow duplicate values and it no longer attempts to do checks for
duplicates at all.

This change does raise the issue of: map/reduce/filter etc. These could quite easily produce
the same value and naturally would cause an error. To combat this, the "new" collection type
can be set per inherited class so the MutableSet when queried returns MutableCollections.
In fact any Collection interface class can be used; including your own.

```php
// change collection type
MutableSet::setCollectionClass(MyCollection::class);

// get the current collection class
MutableSet::getCollectionClass();
```

### Reduction in methods on FrozenCollection (ImmutableCollection)

In V2 the ImmutableCollection was an extension of the main Collection with various methods
overridden to prevent them being used. This was not a great way of handling the differences
as it still meant the collection had all the methods available.

In V3 the `collection` is defined by an interface and ImmutableCollection defines another
branch of this - except there are no mutation methods defined; therefore FrozenCollection has
no mutation methods at all. It contains query methods but not sorting methods as sorting could
change the keys.

This does mean that if you freeze a MutableSet, you now have an ImmutableSet - basically for
free.

Similarly to the mutable collections; the class used as the frozen collection can be changed
for an alternative implementation.

```php
// change class
FrozenCollection::setFreezableClass(SomeClass::class);

// get the current class
FrozenCollection::getFreezableClass();
```

By default if not set, this will automatically use the `static::class` name; so the current
class implementation.

### Array wrapping now optional (default enabled)

The previous collection already had the ability to silently convert arrays to collections when
accessed. This remains, however there are 2 changes:

 1. it can be disabled globally for all collection instances
 2. once accessed the array is switched for the collection
 
With 1. this ensures that the behaviour of all collections is consistent; and with 2. this now
means that if the fetched collection is modified, the original value in the original collection
will also be modified, preventing inconsistencies.

To disable array wrapping:

```php
// before using any collections...
MutableCollection::disableArrayWrapping();

// re-enable
MutableCollection::enableArrayWrapping();

// check status
if (MutableCollection::isArrayWrappingEnabled()) {

}
```

### Factory class moved

The factory class has been moved to `FactoryUtils` and all the methods renamed to start with
`create` instead of `collection`. They now take an additional parameter `$type` that is the
class type to instantiate.

`convertToArray` has been removed and is now in the new `Value` class and is called `toArray`.

### __call removed

The previous behaviour of `__call` was to pass through to `invoke` (now `run`) and call that
method on all items in the collection if the value was an object.

During refactoring it was found that this behaviour was masking bugs and missing methods so
the __call method has been removed completely.

Instead, a magic `__get` property can be accessed to accomplish a similar task:

V2:
```php
// set a request object to all elements in the collection
Collection::collect([array of similar objects])->setRequestTo($request);
```
V3:
```php
// set a request object to all elements in the collection
Collection::collect([array of similar objects])->run->setRequestTo($request);
```

Further: if you attempt to use this on a class that contains non-objects it will raise an
exception. Similarly: calling a method that does not exist on the objects will raise an 
exception. This should help debugging and prevent hard to trace errors.

### Method behaviour changes

`@` prefix no longer required to access dotted keys. It will be stripped automatically but this
behaviour will be removed in 4.0.

`append` that was previously used to join array together through the union operator (`arr + arr`)
will add items to the end of the collection via `array_push`. It now accepts multiple arguments
and each one will be added in turn to the collection. `push` is an alias of `append`.
The previous `append` behaviour is now `union`.

`find` was previously an alias for `search` and would return the key of the value matched.
`search` has been removed with `keys` taking over the responsibility of fetching keys for
values by item searching. `find` now performs a filter and returns _the first_ item matched.

There is a new `findLast` to complement `find` that returns the last element.

`has` now supports multiple arguments and dot notation (when enabled) allowing a truthy test
of nested values. If multiple arguments are provided ALL must be true. To complete `has`
there are `hasAnyOf` that returns true on the first positive match; and `hasNoneOf` that
returns true only if none of the values are present.

During refactoring it became apparent that there were multiple methods doing the same job
as `map`. Previously though the implementation of `map` did not provide keys, however by
switching to the Laravel method, now transform and variations can all be performed through
map making all those other versions redundant.

As of 3.1.0 single argument functions are once again supported by the `map()` method.

```php
Collection::collect([...])->map('trim')->...do more stuff
```

Note: single argument callables will be wrapped in a closure that accepts both arguments. 

`pipe` has been re-implemented to be consistent with Laravels Collection and the previous
functionality has been named `pipeline`. The behaviour of `pipeline` has not changed. `pipe`
passes the collection as argument to the `callable`, returning the result of the callable.

`removeElement` has been deprecated and `remove` now removes items. Previously `remove`
removed the key, however with PHP 7 `unset` can be used as a method name, so now it is more
logical to `unset` a key and `remove` an item. Additionally: as keys() can match multiple
values, `remove` will remove all instances of that value from the collection. If you need
to remove a specific element, use `unset`.

`shuffle` now modifies the _same_ collection; previously it made a new collection. However a
separate trait is included to return a new collection instead (used in Frozen for example).

## Built-in Collections

There are several types of collection that all implement the Collection interface with varying
levels of functionality:

 * SimpleCollection - a very basic, Doctrine ArrayCollection like style collection
 * MutableCollection - more like Laravel Collection, supports dot notation accessing
 * FrozenCollection - more like a Symfony Frozen ParameterBag, but more, with dot notation
 * MutableSet - a pseudo set that does not allow duplicate values, but does allow string keys.

There's no frozen set, but if you freeze a MutableSet; you have yourself a FrozenSet.

## Usage

Instantiate with an array or other collection of items:

```php
$collection = MutableCollection::collect($items);
$collection->map()->filter()...
```

Freeze changes to a collection:

```php
$locked = $collection->freeze()

// raises exception
$locked->shift()
```
Use a custom Immutable collection class:
```php
MutableCollection::setFreezeableClass();
$locked = $collection->freeze()

// raises exception
$locked->shift()
```

### Dot Access

Dot access is available on:

 * has*
 * get
 * extract
 * aggregate functions

For example: `users.*.name` would fetch the name from all elements in the users key space. Dot access
can call into:

 * arrays
 * Collections
 * public object properties
 * object return methods e.g.: `name` would be translated to `name()`
 * object `get` methods e.g: `name` would be translated to `getName()`

If the key name uses snake casing e.g.: user_address, this will be converted to UserAddress for method
access checks.

A default can be supplied with `get()` that if the specified key does not exist, it will be used instead.
The default can be a closure. Note: that this will be called for all elements e.g: `users.*.age` with a
default that returned `0`, would return 0 for all matching users without an age present.

Key walking is implemented in a standalone class allowing it to be re-used in other classes. This functionality
is based on Laravel's `data_get()` and `Arr::pluck()`, modified to support getter methods and default handling
when extracting from objects.

## Method Index

The collection behaviour docs are generated from the source code and are available in the `docs` folder.

### Factory Methods

#### On the collection class

 * `collect()` create a new Collection statically
 * `create()` create a new Collection statically

#### As helpers in the FactoryUtils 

 * `createFromIniString()` create a Collection from an ini style string
 * `createFromString()` split an encoded string into a Collection
 * `createFromUrl()` given a URL returns a Collection after using `parse_url()`
 * `createFromUrlQuery()` converts a URL query string to a Collection using `parse_str()`
 * `createWithNestedArrayFromKey` converts a key like `user.addresses.home` to a nested collection
 * `explode()` explode a string into a Collection

### Methods by Group

 | [Aggregates](docs/aggregates.md) | [Assertable](docs/assertable.md) | [Comparable](docs/comparable.md) | [Exportable](docs/exportable.md) | [Filterable](docs/queryable.md) | [Mappable](docs/mappable.md)
 | ---                | ---           | ---                                                               | ---                | ---           | ---
 | average            | assert        | diff                                                              | jsonSerialize      | filter        | collapse
 | max                |               | diffUsing                                                         | toArray            | matching      | flatMap
 | median             |               | diffAssoc                                                         | toJson             | notMatching   | flatten
 | min                |               | diffAssocUsing                                                    | toQueryString      | reject        | map
 | modal              |               | diffKeys                                                          | toString           | except        | mapInto
 | sum                |               | diffKeysUsing                                                     | serialize          | has           | reduce
 | countBy            |               | intersect                                                         | unserialize        | hasAnyOf      |
 |                    |               | intersectByKeys                                                   |                    | hasNoneOf     |
 |                    |               |                                                                   |                    | keys          |
 |                    |               |                                                                   |                    | keysMatching  |
 |                    |               |                                                                   |                    | only          |
 |                    |               |                                                                   |                    | with          |
 |                    |               |                                                                   |                    | without       |
 
 | [Mutable](docs/mutateable.md) | [Partitionable](docs/partitionable.md) | [Queryable](docs/queryable.md)  | [Runnable](docs/runnable.md) | [String Helpers](docs/string_helpers.md)
 | ---                | ---           | ---                                                                 | ---       | ---
 | add                | groupBy       | all                                                                 | each      | capitalize
 | append             | partition     | contains                                                            | pipe      | lower
 | concat             | slice         | doesNotContain                                                      | pipeline  | trim
 | combine            | splice        | extract                                                             | run       | upper
 | clear              |               | find                                                                |           | 
 | combine            |               | findLast                                                            |           | 
 | fill               |               | first                                                               |           | 
 | fillKeysWith       |               | get                                                                 |           | 
 | flip               |               | last                                                                |           | 
 | merge              |               | has                                                                 |           | 
 | pad                |               | removeEmpty                                                         |           | 
 | pop                |               | removeNulls                                                         |           | 
 | prepend            |               | sortByKey                                                           |           | 
 | push               |               | sortByKeyReversed                                                   |           | 
 | remapKeys          |               | sortByValue                                                         |           | 
 | remove             |               | sortByValueReversed                                                 |           | 
 | replace            |               | sortUsing                                                           |           | 
 | replaceRecursively |               | sortUsingWithKeys                                                   |           | 
 | reverse            |               | value                                                               |           | 
 | set                |               | values                                                              |           | 
 | shift              |               |                                                                     |           | 
 | shuffle            |               |                                                                     |           | 
 | union              |               |                                                                     |           | 
 | unset              |               |                                                                     |           | 

### Magic Methods & PHP Interface Methods
 
 * getIterator
 * offsetGet
 * offsetExists
 * offsetSet
 * offsetUnset
 * __get
 * __isset
 * __set
 * __set_state
 * __unset

### Deprecated Methods
 
 * append() is now union(); append() adds elements to the array without keys
 * invoke() use run()
 * removeElement() use remove()
 * transform() use map()
 * find() returns the first match from a filter() and NOT a key
 * pipe() was renamed to pipeline()
 * using invoke() (run()) now uses the splat operator so arguments should be passed as separate args not as an array
 * using remove() to remove keys, use unset()

### Removed from v3

 * __call() has been removed as it masks method errors
 * call() use map()
 * implodeKeys() use keys()->implode()
 * search() use filter() or keys()
 * walk() use map()
 * using set() to replace the Collection has been removed

### Removed from v2

 * isValueInSet() use contains()
 * addIfNotInSet() use add()
 * findByRegex() use match()
 * isModified() - removed from v2
