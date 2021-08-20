Change Log
==========

2021-08-20 - 5.1.0
------------------

 * Add `hasAllOf` as alias of `has()` for checking if all keys exist in collection
 * Add `matchingRule` to filter values for keys matching a regex expression
 * Fix invalid variable usage in `ClassUtils::setProperty()`
 * Fix `get()` to execute callables as defaults
 * Update closures to use short arrow syntax where possible

2021-01-21 - 5.0.1
------------------

 * Fix type hint on `remove()` should be mixed in interface

2021-01-20 - 5.0.0
------------------

 * Add union return types and better type hints
 * Update docs

2021-01-18
----------

 * Update for PHP8
 * Update docs
 * Remove deprecated v4.X methods

2020-10-05 - 4.0.1
------------------

 * Fix bug in `pipeline` using the wrong key for items

2020-09-29
----------

 * Re-namespace to `Somnambulist\Components`

2020-08-26 - 4.0.0
------------------

 * Release 4.0.0 as stable

2020-08-25
----------

 * Raise minimum PHP version to 7.4
 * Remove all deprecated methods
 * Refactor sorting methods and deprecate previous methods
 * Move major version changes into separate files

2020-07-16 - 3.3.2
------------------

 * Fix explode() requires a string and will fail if given an int (in KeyWalker)

2020-04-23 - 3.3.1
------------------

 * Fix first/last do not wrap arrays when nested arrays are in the collection
 * Fix pop/shift do not wrap arrays when used with nested arrays
   
   Note: this could be considered an API BC break, however the expected behaviour is for any
   operation returning data from the collection to honour the "wrapArrays" setting.

2020-03-12 - 3.3.0
------------------

 * API BC break static vs non-static
 * Fix bug with `AbstractCollection::$collectionClass` causing ambiguous behaviour.
   
   The previous behaviour used a static property that was set on the first operation that
   required a new collection instance. If an extended collection is in use, then this type
   would be set and all collection instances would now be that type. Instead: this should
   have been an instance property based on the currently instantiated class. The result
   of the previous behaviour would be type errors if inheriting the default collections and
   adding custom methods that used return type hints.
   
   While this fix is an API break, this was deemed necessary to prevent the current behaviour.
   
 * Fix bug with `Freeze::$freezableClass` causing ambiguous behaviour.
   
   For the same reasons as the previous fix, this makes the freezeableClass non-static and an
   instance property instead of being global.

2020-03-12 - 3.2.5
------------------

 * Fix doubly loaded trait on MutableSet (`capitalize`)

2020-03-12 - 3.2.4
------------------

 * Fix bug in `KeyWalker` where methods with no properties could not be accessed

2020-03-06 - 3.2.3
------------------

 * Fix bug in extract if objects used as keys

2019-08-05 - 3.2.2
------------------

 * Fix missing constructor on `SimpleCollection`

2019-08-05 - 3.2.1
------------------

 * Added `random` for getting the first element from a `shuffle`'d collection

2019-08-05 - 3.2.0
------------------

 * Minor BC break on `first` and `last`; now return `null` if the key is not found
 * Added additional `find` tests and `find` / `findLast` return false if not found
 
2019-08-05 - 3.1.0
------------------

 * Allow map() to accept single argument functions again
 
2019-07-23 - 3.0.4
------------------

 * bug fix - trait was duplicated in Group\Filterable \ Queryable
 
2019-07-17 - 3.0.3
------------------

 * bug fix - trait was duplicated in Group\Mutable

2019-07-17 - 3.0.2
------------------

 * added magic ->map->{method}() calling to run a method on the objects in the collection

2019-07-11 - 3.0.1
------------------

 * added support for magic property detection via __isset() checks

2019-07-09 - 3.0.0
------------------

 * V3 is a major BC break with the V2 series
 * full refactoring of the entire library
 * sub-divided functionality into traits
 * added interfaces to describe grouped behaviour
 * added default trait groups
 * added pseudo Set (string keys) that limits to unique values
 * added SimpleCollection with limited functionality
 * added static `create` and separate `new` method
 * added customising the collection class created when methods create new classes
 * added customising the frozen class type when using `Freezable`
 * added extra methods to `exportToArray`
 * key walking now available in many more functions
 * many deprecations
 * many changes to behaviour and handling
 * changed `ExportableInterface` -> `Arrayable`
 * changed `Collection` -> `MutableCollection`
 * changed `Immutable` -> `FrozenCollection`
 * changed rules for converting to arrays on collection creation
 * changed `__call` behaviour to use a proxy via the magic `run` property accessor
 * deprecated `removeElement` use `remove`; remove now removes values; use `unset` to remove keys
 * deprecated `transform` it is replaced by `map`
 * removed all deprecated v2 methods
 * removed `implodeKeys` use `keys()->implode()`
 * removed `invoke` it is now `run`
 * removed `walk` similar functionality can be achieved using `map`

2018-06-26 - 2.2.0
------------------

 * added `ExportableInterface` (thanks to @Garethp)
 * possible bug: in Collection factory, Collection used toArray now uses all() to get contents

2018-06-14 - 2.1.4
------------------

 * added `pipe()` allowing a Collection of items to be transformed by a Collection of operators

2018-05-01 - 2.1.3
------------------

 * added `toQueryString()`
 * added `removeEmpty()`
 * added support for accessing dot key names directly in get() via `@` prefix
 * removed composer.lock and added .gitattributes for cleaner exporting

2017-08-06 - 2.1.2
------------------

 * added dot access via `get()` allowing Collections to be traversed using `key.*.value` syntax
 * added support class for some common functions
 * refactored `extract()` and `flatten()`
 * replacing Collection contents via an array on `set()` is now deprecated
 * docs update

2017-06-28
----------

 * added extract()
 * refactored unit tests to reduce the size off the main test file

2017-06-27 - 2.0.1
------------------

 * added shuffle() (thanks to @paulmaclean)

2017-06-23 - 2.0.0
------------------

 * changed each() to mirror other Collection each implementations - BC break!
 * changed methods that accept arrays to use convertToArray()
 * changed call() to transform() - call() is now deprecated
 * removed all previously deprecated methods
 * removed static factory methods to a factory class (except collect())
 * removed modified flag
 * added assert()
 * added only()
 * added partition()
 * added value()
 * extracted some method groups into traits

2017-04-17 - 1.3.0
------------------

 * added lower, upper, intersect, trim, diff, diffKeys, fill, fillKeysWith, explode, collectionFromString, toJson
 * re-ordered methods to group PHP interface methods together
 * moved other methods into (mostly) alphabetical order
 * moved deprecated methods together

2017-04-15 - 1.2.0
------------------

 * added min, max and sum; loosely based on Laravels Collection methods of the same name
 * added additional unit tests
 * cleaned up offsetSet and fixed bug where null offset was not correctly handled
 
2017-03-20 - 1.1.1
------------------

 * fixed serialization bug with Immutable collections

2017-02-17 - 1.1.0
------------------

 * fixed bug in filter not passing the flag through
 * added except for excluding keys
 * added call as an alternative to walk / each that uses a more standard callable
 * added documentation for callables
 * removed unneeded docblocks
 * cleaned up some argument names and internal naming
 * marked findByRegex, isValueInSet and addIfNotInSet as deprecated

2017-01-22 - 1.0.0
------------------

 * addition of pop, shift, slice and each
 * fixed Immutable

2017-01-22
----------

Initial commit, forked from domain input mapper.
