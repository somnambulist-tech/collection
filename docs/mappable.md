## Table of contents

- [\Somnambulist\Collection\Behaviours\MapReduce\Reduce](#class-somnambulistcollectionbehavioursmapreducereduce)
- [\Somnambulist\Collection\Behaviours\MapReduce\Collapse](#class-somnambulistcollectionbehavioursmapreducecollapse)
- [\Somnambulist\Collection\Behaviours\MapReduce\Map](#class-somnambulistcollectionbehavioursmapreducemap)
- [\Somnambulist\Collection\Behaviours\MapReduce\MapInto](#class-somnambulistcollectionbehavioursmapreducemapinto)
- [\Somnambulist\Collection\Behaviours\MapReduce\FlatMap](#class-somnambulistcollectionbehavioursmapreduceflatmap)
- [\Somnambulist\Collection\Behaviours\MapReduce\Flatten](#class-somnambulistcollectionbehavioursmapreduceflatten)

<hr />

### Class: \Somnambulist\Collection\Behaviours\MapReduce\Reduce

> Trait Reduce

| Visibility | Function |
|:-----------|:---------|
| public | <strong>reduce(</strong><em>callable</em> <strong>$callback</strong>, <em>mixed</em> <strong>$initial=null</strong>)</strong> : <em>mixed</em><br /><em>Reduces the Collection to a single value, returning it, or $initial if no value</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\MapReduce\Collapse

> Trait Collapse

| Visibility | Function |
|:-----------|:---------|
| public | <strong>collapse()</strong> : <em>\Somnambulist\Collection\Behaviours\MapReduce\static</em><br /><em>Collapse the collection of items into a single array</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\MapReduce\Map

> Trait Map

| Visibility | Function |
|:-----------|:---------|
| public | <strong>map(</strong><em>\callable</em> <strong>$callable</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\MapReduce\static</em><br /><em>Apply the callback to all elements in the collection Note: the callable must accept 2 arguments: the value and the key. For single argument functions (e.g. strrev) it must be wrapped in a Closure. For trim and variants that have multiple arguments, again, ensure the function is wrapped in a closure; otherwise the behaviour will be undefined.</em> |
| public | <strong>transform(</strong><em>\callable</em> <strong>$transformer</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\MapReduce\static</em><br /><em>Alias of map()</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\MapReduce\MapInto

> Trait MapInto

| Visibility | Function |
|:-----------|:---------|
| public | <strong>mapInto(</strong><em>\string</em> <strong>$class</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\MapReduce\static</em><br /><em>Map the values into a new class.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\MapReduce\FlatMap

> Trait FlatMap

| Visibility | Function |
|:-----------|:---------|
| public | <strong>flatMap(</strong><em>\callable</em> <strong>$callable</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\MapReduce\static</em><br /><em>Map a collection and flatten the result by a single level</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\MapReduce\Flatten

> Trait Flatten

| Visibility | Function |
|:-----------|:---------|
| public | <strong>flatten()</strong> : <em>\Somnambulist\Collection\Behaviours\MapReduce\static</em><br /><em>Returns a new Collection with all sub-sets / arrays merged into one Collection If similar keys exist, they will be overwritten. This method is intended to convert a multi-dimensional array into a key => value array. This method is called recursively through the Collection.</em> |
| public | <strong>flattenWithDotKeys()</strong> : <em>\Somnambulist\Collection\Behaviours\MapReduce\static</em><br /><em>Returns a new Collection with all sub-sets / arrays merged into one Collection Key names are flattened into dot notation, though overwrites may still occur.</em> |
