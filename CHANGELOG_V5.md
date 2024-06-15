
## Important Changes in 5.X series

### Re-namespaced

`Somnambulist\Collection` is now `Somnambulist\Components\Collection`. This is a change being
made to all the `somnambulist/*` packages.

### PHP 8 Compatibility

The 5.X series properly supports PHP 8 and makes use of PHP 8 features such as the static return
type, union types and the mixed return type.

PHP 8 is now required to use this library.

### Removal of all 4.X deprecated features

All features previously marked as deprecated in the 4.X series have been removed. This includes:

 * `sortUsing()`
 * `sortUsingWithKeys()`
 * `sortByValue()`
 * `sortByValueReversed()`
 * `sortByKey()`
 * `sortByKeyReversed()`

### Miscellaneous Changes

 * Keys are typed to `int|string` across the board instead of inferred mixed/string
 * `GetWithDotNotation::get()` no longer supports `null` for all values; use `all()` instead

### 5.5.0 addition of type to collections

From 5.5.0, collections can be extended and the "type" set to restrict the collection to a specific type
of values. The type can be any of:

 * int
 * float
 * bool
 * string
 * scalar
 * array
 * object or interface class

To accommodate this change, `SimpleCollection` and `MutableCollection` now have the collectionClass set to themselves
to prevent issues of methods like `map()` causing errors due to returning values not supported by the type.

To set the type: extend the collection type you wish to make type specific, and then set the property `$type` to
the type you want the collection to contain. This will typically be a class name, though the standard PHP types
can be used - except for resources.
