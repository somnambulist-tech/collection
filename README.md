# Somnambulist Collection Library

[![GitHub Actions Build Status](https://img.shields.io/github/workflow/status/somnambulist-tech/collection/tests?logo=github)](https://github.com/somnambulist-tech/collection/actions?query=workflow%3Atests)
[![Issues](https://img.shields.io/github/issues/somnambulist-tech/collection?logo=github)](https://github.com/somnambulist-tech/collection/issues)
[![License](https://img.shields.io/github/license/somnambulist-tech/collection?logo=github)](https://github.com/somnambulist-tech/collection/blob/master/LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/somnambulist/collection?logo=php&logoColor=white)](https://packagist.org/packages/somnambulist/collection)
[![Current Version](https://img.shields.io/packagist/v/somnambulist/collection?logo=packagist&logoColor=white)](https://packagist.org/packages/somnambulist/collection)

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

### Change History

 * [V3 Deprecations, API changes](CHANGELOG_V3.md)
 * [V4 Deprecations, API changes](CHANGELOG_V4.md)
 * [V5 Deprecations, API changes](CHANGELOG_V5.md)

## Requirements

 * PHP 7.4+
 * ext-json for JSON export

## Installation

Install using composer, or checkout / pull the files from github.com.

 * composer require somnambulist/collection

## Contributing

Contributions are more than welcome! Whether doc improvements, new methods or bug fixes.
In all cases, fork the repository, make a branch then submit a PR - the usual GitHub flow.

Please consider the following:

 * the minimum version of PHP is 7.4
 * traits should not specify a return type but must include a docblock return type
 * return types for the Collection must be `static` to allow runtime resolution
 * all trait methods must have docblocks - these are converted to docs
 * if a trait uses code from elsewhere, it should be attributed whenever possible
 * consider the type of operation and if it will work in a Set or a Frozen collection
 * tests should be included

Remember that the Collection could be a Set or Frozen, so often it is necessary to operate
on the values and then create a new collection after processing. See the current implementations
for examples.

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
$locked = $collection->freeze();

// raises exception
$locked->shift();
```
Use a custom Immutable collection class:
```php
MutableCollection::setFreezeableClass();
$locked = $collection->freeze();

// raises exception
$locked->shift();
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

## Proxy Helpers

New in v4 is an expansion of the run/map proxies used to make operations across the set. Now additional
proxies can be bound to virtual properties that can be accessed at runtime. This allows for additional
custom behaviour or the creation of mini Domain Specific Languages within the collection.

It is recommended when adding additional proxy options, that this is done in a child class of the collection
so that the options can be documented using `@property-read` declarations in the class docblock. By default
`run` and `map` are pre-bound in the built-in collections, however these can be overridden if necessary.

Proxies are lazy instantiated when accessed so should have a minimal impact on performance. For most cases
the proxy is mapped by the full qualified class name to an alias, but for more complex construction a closure
can be used.

The proxy can be called by:

 * `$collection->proxy(<alias>)->someMethod()`
 * `$collection-><alias>->someMethod()`

For example: to run the method `setDateTo()` on a collection of objects that have this method:

 * `$collection->run->setDateTo(new DateTime())` or
 * `$collection->proxy('run')->setDateTo(new DateTime())`

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
 | countBy            |               | intersect                                                         | unserialize        | hasAllOf      |
 |                    |               | intersectByKeys                                                   |                    | hasAnyOf      |
 |                    |               |                                                                   |                    | hasNoneOf     |
 |                    |               |                                                                   |                    | keys          |
 |                    |               |                                                                   |                    | keysMatching  |
 |                    |               |                                                                   |                    | only          |
 |                    |               |                                                                   |                    | with          |
 |                    |               |                                                                   |                    | without       |
 |                    |               |                                                                   |                    | matchingRule  |
 
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
 | pad                |               | random                                                              |           | 
 | pop                |               | removeEmpty                                                         |           | 
 | prepend            |               | removeNulls                                                         |           | 
 | push               |               | sort                                                                |           | 
 | remapKeys          |               | sortBy                                                              |           | 
 | remove             |               | value                                                               |           | 
 | replace            |               | values                                                              |           | 
 | replaceRecursively |               |                                                                     |           | 
 | reverse            |               |                                                                     |           | 
 | set                |               |                                                                     |           | 
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
