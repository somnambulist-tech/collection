
## Important Changes in 4.X series

### Minimum PHP version is 7.4

The 4.X series requires PHP 7.4 at a minimum and many of the internals have been re-worked to
take advantage of 7.4 features. 3.X continues to require PHP 7.2 or above.

### Removal of all 3.X deprecated features

All features previously marked as deprecated in the 3.X series have been removed. This includes:

 * `@` prefix for array keys (not needed)
 * `removeElement`
 * `transform`

### Sorting changes

In previous versions there were multiple methods for sorting the collection with each one
corresponding to the underlying PHP array sort functions. This has been changed to favour
2 main methods:

 * `sort(callable)`
 * `sortBy()`

`sort` now uses `uasort()` under the hood, keeping all key associations. Previously `usort()`
was the default sorting function that would create new keys.

Sorting functions are now in a `Sortable` group trait to match the `Sortable` interface and
have been removed from the Queryable group.

All sorting functions now preserve the key association, so the FrozenCollection can make
use of them.

### Map/Run Proxy Changes

In v3 to run methods or map results these were hard-wired in a custom `__get()` implementation.
For v4, these proxies are now an extensible sub-system that can be overridden and added to.
The functionality of the previous run and map are still the same, but now you can add any other
custom proxies for enhanced functionality.

### Filter Changes

A frequent use case is to filter the collection for specific values at certain keys or properties.
The `filter` method can now accept the property/key name, and a value to search for without
having to specify a full closure. Values are matched use `===`.

### Miscellaneous Changes

 * Internal callbacks have been refactored to use short function notation where possible
 * Standardised argument naming to `items` for multiple values and `value` for a single value
 * Standardised `offset` when dealing with SPL interfaces / pages; `key` otherwise
 * `CountBy` trait was incorrectly named `CountyBy`, this has been corrected
 * `Freeze` trait has been renamed to `Freezeable` 
 * `SimpleCollection` now implements `Sortable`

### Deprecated Methods from v4

 * `sortUsing()`
 * `sortUsingWithKeys()`
 * `sortByValue()`
 * `sortByValueReversed()`
 * `sortByKey()`
 * `sortByKeyReversed()`
