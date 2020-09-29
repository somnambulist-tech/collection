## Table of contents

- [\Somnambulist\Components\Collection\Behaviours\Query\RemoveEmpty](#class-somnambulistcomponentscollectionbehavioursqueryremoveempty)
- [\Somnambulist\Components\Collection\Behaviours\Query\FilterValues](#class-somnambulistcomponentscollectionbehavioursqueryfiltervalues)
- [\Somnambulist\Components\Collection\Behaviours\Query\Extract](#class-somnambulistcomponentscollectionbehavioursqueryextract)
- [\Somnambulist\Components\Collection\Behaviours\Query\Keys](#class-somnambulistcomponentscollectionbehavioursquerykeys)
- [\Somnambulist\Components\Collection\Behaviours\Query\Values](#class-somnambulistcomponentscollectionbehavioursqueryvalues)
- [\Somnambulist\Components\Collection\Behaviours\Query\GetValue](#class-somnambulistcomponentscollectionbehavioursquerygetvalue)
- [\Somnambulist\Components\Collection\Behaviours\Query\All](#class-somnambulistcomponentscollectionbehavioursqueryall)
- [\Somnambulist\Components\Collection\Behaviours\Query\Unique](#class-somnambulistcomponentscollectionbehavioursqueryunique)
- [\Somnambulist\Components\Collection\Behaviours\Query\HasKey](#class-somnambulistcomponentscollectionbehavioursqueryhaskey)
- [\Somnambulist\Components\Collection\Behaviours\Query\Value](#class-somnambulistcomponentscollectionbehavioursqueryvalue)
- [\Somnambulist\Components\Collection\Behaviours\Query\GetValueWithDotNotation](#class-somnambulistcomponentscollectionbehavioursquerygetvaluewithdotnotation)
- [\Somnambulist\Components\Collection\Behaviours\Query\Find](#class-somnambulistcomponentscollectionbehavioursqueryfind)
- [\Somnambulist\Components\Collection\Behaviours\Query\FilterByKey](#class-somnambulistcomponentscollectionbehavioursqueryfilterbykey)
- [\Somnambulist\Components\Collection\Behaviours\Query\SortValues](#class-somnambulistcomponentscollectionbehavioursquerysortvalues)
- [\Somnambulist\Components\Collection\Behaviours\Query\Sort](#class-somnambulistcomponentscollectionbehavioursquerysort)
- [\Somnambulist\Components\Collection\Behaviours\Query\RandomValue](#class-somnambulistcomponentscollectionbehavioursqueryrandomvalue)
- [\Somnambulist\Components\Collection\Behaviours\Query\Last](#class-somnambulistcomponentscollectionbehavioursquerylast)
- [\Somnambulist\Components\Collection\Behaviours\Query\HasKeyWithDotNotation](#class-somnambulistcomponentscollectionbehavioursqueryhaskeywithdotnotation)
- [\Somnambulist\Components\Collection\Behaviours\Query\Contains](#class-somnambulistcomponentscollectionbehavioursquerycontains)
- [\Somnambulist\Components\Collection\Behaviours\Query\First](#class-somnambulistcomponentscollectionbehavioursqueryfirst)
- [\Somnambulist\Components\Collection\Behaviours\Query\RemoveNulls](#class-somnambulistcomponentscollectionbehavioursqueryremovenulls)
- [\Somnambulist\Components\Collection\Behaviours\Query\SortKeys](#class-somnambulistcomponentscollectionbehavioursquerysortkeys)

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\RemoveEmpty

> Trait RemoveEmpty

| Visibility | Function |
|:-----------|:---------|
| public | <strong>removeEmpty(</strong><em>array</em> <strong>$empty=array()</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Removes values that are matched as empty through an equivalence check</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\FilterValues

> Trait FilterValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>filter(</strong><em>mixed</em> <strong>$criteria=null</strong>, <em>mixed</em> <strong>$test=null</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Filters the collection using the callback The callback receives both the value and the key. If a key name and value are given, will filter all items at that key with the value provided. Key can be an object method, property or array key.</em> |
| public | <strong>matching(</strong><em>\callable</em> <strong>$criteria</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Alias of filter but requires the callable</em> |
| public | <strong>notMatching(</strong><em>\callable</em> <strong>$criteria</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Returns items that do NOT pass the test callable The callable is wrapped and checked if it returns false. For example: your callable is a closure that `return Str::contains($value->name(), 'bob');`, then `notMatching` will return all items that do not match that criteria.</em> |
| public | <strong>reject(</strong><em>\callable</em> <strong>$criteria</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Alias of notMatching</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Extract

> Trait Extract

| Visibility | Function |
|:-----------|:---------|
| public | <strong>extract(</strong><em>string</em> <strong>$element</strong>, <em>string/null</em> <strong>$withKey=null</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Extract the values for all items with an element named $element, optionally indexed by $withKey</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Keys

> Trait Keys

| Visibility | Function |
|:-----------|:---------|
| public | <strong>keys(</strong><em>mixed</em> <strong>$value=null</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Returns a new collection containing just the keys as values If a value is provided, then all keys with this value will be returned. Searching is always by strict match.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Values

> Trait Values

| Visibility | Function |
|:-----------|:---------|
| public | <strong>values()</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Returns a new collection containing just the values without the previous keys</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\GetValue

> Trait GetValue

| Visibility | Function |
|:-----------|:---------|
| public | <strong>get(</strong><em>string</em> <strong>$key</strong>, <em>mixed</em> <strong>$default=null</strong>)</strong> : <em>mixed</em><br /><em>Get the value at the specified key, if the _KEY_ does NOT exist, return the default Note: if the key is null or false, the value will be returned. If you must have a non falsey value, use {@link value()} instead.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\All

> Trait All

| Visibility | Function |
|:-----------|:---------|
| public | <strong>all()</strong> : <em>array</em><br /><em>Returns the underlying collection array</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Unique

> Trait Unique

| Visibility | Function |
|:-----------|:---------|
| public | <strong>unique(</strong><em>integer</em> <strong>$type=2</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Creates a new Collection containing only unique values</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\HasKey

> Trait HasKey

| Visibility | Function |
|:-----------|:---------|
| public | <strong>has(</strong><em>mixed</em> <strong>$key</strong>)</strong> : <em>bool</em><br /><em>Returns true if the key(s) all exist in the collection</em> |
| public | <strong>hasValueFor(</strong><em>string</em> <strong>$key</strong>)</strong> : <em>boolean</em><br /><em>Returns true if the specified key exists in the Collection and is not empty Empty in this case is not an empty string, null, zero or false. It should not be used to check for null or boolean values.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Value

> Trait Value

| Visibility | Function |
|:-----------|:---------|
| public | <strong>value(</strong><em>string</em> <strong>$key</strong>, <em>mixed/callable</em> <strong>$default=null</strong>)</strong> : <em>mixed</em><br /><em>Returns the value for the specified key or if there is no value, returns the default Default can be a callable (closure) that will be executed. This method differs to</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\GetValueWithDotNotation

> Trait GetValueWithDotNotation

| Visibility | Function |
|:-----------|:---------|
| public | <strong>get(</strong><em>string</em> <strong>$key</strong>, <em>mixed</em> <strong>$default=null</strong>)</strong> : <em>mixed</em><br /><em>Get the value at the specified key using dot notation This trait replaces the standard CanGetKey with one that can cascade into the collection items e.g. user.*.town would look for a user key first, then any elements with a town property / key. The item(s) would then be returned. If the key is not found, then default will be returned that can be a closure. Note: if the key exists it's VALUE is returned! This means it could be null / false. If you need to ensure a particular value, use {@link value()} instead.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Find

> Trait Find

| Visibility | Function |
|:-----------|:---------|
| public | <strong>find(</strong><em>callable/mixed</em> <strong>$criteria</strong>)</strong> : <em>mixed</em><br /><em>Finds the first item matching the criteria</em> |
| public | <strong>findLast(</strong><em>callable/mixed</em> <strong>$criteria</strong>)</strong> : <em>mixed</em><br /><em>Finds the last item matching the criteria</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\FilterByKey

> Trait FilterByKey

| Visibility | Function |
|:-----------|:---------|
| public | <strong>except(</strong><em>mixed</em> <strong>$ignore</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Alias of without()</em> |
| public | <strong>hasAnyOf(</strong><em>mixed</em> <strong>$key</strong>)</strong> : <em>bool</em><br /><em>Returns true if any of the keys are present in the collection</em> |
| public | <strong>hasNoneOf(</strong><em>mixed</em> <strong>$key</strong>)</strong> : <em>bool</em><br /><em>Returns true if NONE of the keys are present in the collection</em> |
| public | <strong>keysMatching(</strong><em>string/callable</em> <strong>$criteria</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Find keys matching the criteria, returning a new collection of the keys</em> |
| public | <strong>only(</strong><em>mixed</em> <strong>$keys</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Alias of with()</em> |
| public | <strong>with(</strong><em>mixed</em> <strong>$keys</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Returns a new collection with only the specified keys</em> |
| public | <strong>without(</strong><em>mixed</em> <strong>$keys</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Returns a new collection WITHOUT the specified keys</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\SortValues

> Trait SortValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>sortByValue(</strong><em>mixed</em> <strong>$type=2</strong>)</strong> : <em>void</em> |
| public | <strong>sortByValueReversed(</strong><em>mixed</em> <strong>$type=2</strong>)</strong> : <em>void</em> |
| public | <strong>sortUsing(</strong><em>mixed</em> <strong>$callable</strong>)</strong> : <em>void</em> |
| public | <strong>sortUsingWithKeys(</strong><em>mixed</em> <strong>$callable</strong>)</strong> : <em>void</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Sort

> Trait Sort

| Visibility | Function |
|:-----------|:---------|
| public | <strong>sort(</strong><em>mixed</em> <strong>$callable</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Sort the Collection by a user defined function, preserves key association</em> |
| public | <strong>sortBy(</strong><em>\string</em> <strong>$type</strong>, <em>\string</em> <strong>$dir=`'asc'`</strong>, <em>\int</em> <strong>$comparison=2</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Sort the collection by `value` or `key` ordered `asc` (A-Z) or `desc` (Z-A)</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\RandomValue

> Trait RandomValue

| Visibility | Function |
|:-----------|:---------|
| public | <strong>random()</strong> : <em>mixed</em><br /><em>Shuffles the collection and picks the first element from it</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Last

> Trait Last

| Visibility | Function |
|:-----------|:---------|
| public | <strong>last()</strong> : <em>mixed</em><br /><em>Returns the last element of the Collection or null if empty</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\HasKeyWithDotNotation

> Trait HasKeyWithDotNotation

| Visibility | Function |
|:-----------|:---------|
| public | <strong>has(</strong><em>mixed</em> <strong>$key</strong>)</strong> : <em>bool</em><br /><em>Return true if the key(s) exist using dot notation This trait replaces the standard HasKey with one that can cascade into the collection items e.g. user.*.town would look for a user key first, then any elements with a town property / key. If any element has that key, true is returned. If no items match, then false is returned. Note: will return true for null/false key checks and properties.</em> |
| public | <strong>hasValueFor(</strong><em>string</em> <strong>$key</strong>)</strong> : <em>boolean</em><br /><em>Returns true if the specified key exists in the Collection and is not empty Empty in this case is not an empty string, null, zero or false. It should not be used to check for null or boolean values.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\Contains

> Trait Contains

| Visibility | Function |
|:-----------|:---------|
| public | <strong>contains(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>bool</em><br /><em>Returns true if value is in the collection</em> |
| public | <strong>doesNotContain(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>void</em> |
| public | <strong>doesNotInclude(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>bool</em><br /><em>Alias of doesNotContain</em> |
| public | <strong>includes(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>bool</em><br /><em>Alias of contains</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\First

> Trait First

| Visibility | Function |
|:-----------|:---------|
| public | <strong>first()</strong> : <em>mixed/null</em><br /><em>Returns the first element from the collection; or null if empty</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\RemoveNulls

> Trait RemoveNulls

| Visibility | Function |
|:-----------|:---------|
| public | <strong>removeNulls()</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Removes any null items from the Collection, returning a new collection</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Query\SortKeys

> Trait SortKeys

| Visibility | Function |
|:-----------|:---------|
| public | <strong>sortByKey(</strong><em>null/integer</em> <strong>$type</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Sort the Collection by designated keys</em> |
| public | <strong>sortByKeyReversed(</strong><em>null/integer</em> <strong>$type</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Query\static</em><br /><em>Sort the Collection by designated keys in reverse order</em> |

