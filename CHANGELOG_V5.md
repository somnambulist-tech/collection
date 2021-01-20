
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
