
## Important Changes in 3.X series

### >=3.3 AbstractCollection::$collectionClass / Freeze::$freezableCLass changed

From 3.3.0 the referenced properties have been changed to non-static as the previous behaviour
was ambiguous and would result in inconsistent types when new collections were made, or a
collection was frozen. Calls to the previous static methods should be made on the collection
instance.

Additionally: if needing to override the behaviour, it is best done in the constructor of any
inherited collection class e.g. `MyCollection extends MutableCollection` then override the
constructor and set the collectionClass / freezableClass as needed.

### >=3.2 first/last return type change

From 3.2.0 the methods `first` and `last` will now return `null` if the collection is empty
instead of false. `find` and `findLast` will still return boolean `false`. This change was
made to make the `null` return value more consistent.

## Important BC Breaks with 2.2

### Value conversion to collections on create

The level of conversion attempted when creating a collection with value (`Collection::collect`)
has changed. Previously toJson / asJson would be called, converting anything with those to
arrays. These methods are no longer called and the objects will be preserved. This is to prevent
Model objects having attributes extracted, or potentially expensive serialization processes
being triggered.

Additionally: performing a recursive, `deep`, conversion has been removed. Now only the top 
level item will be converted to an array and any nested items will be left alone.

### MutableSet enforces unique values

Previously the v2 collection was a mix of set and collection in that you can create it with
the same value, but could not add the same value multiple times - unless using merge, append
or other creative ways of joining data together.

With v3 there is both a MutableCollection AND a MutableSet. Now the MutableSet _does_ enforce
value uniqueness and this extends to: merge, combine, union, append, prepend and in fact any
attempt to mutate the set where you can add values. Attempting to add duplicate values raises
an exception, instead of doing nothing.  

The MutableCollection _does_ allow duplicate values.

This change does raise the issue of: map/reduce/filter etc. These could quite easily produce
the same value and naturally would cause an error. To combat this, the "new" collection type
can be set per inherited class. The MutableSet uses the MutableCollection class for these methods.

```php
// change collection type
$collection = new MutableSet();
$collection->setCollectionClass(MyCollection::class);

// get the current collection class
$collection->getCollectionClass();
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

Similar to the mutable collections; the class used as the frozen collection can be changed
for an alternative implementation.

__Note:__ since v3.3 these methods and property are now per instance and not global.

```php
// change class
$collection = new MutableCollection();
$collection->setFreezableClass(SomeClassImplementingImmutableInterface::class);

// get the current class
$collection->getFreezableClass();
```

By default the frozen class is: `Somnambulist\Collection\FrozenCollection::class`.

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

### Deprecated Methods from v3
 
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
