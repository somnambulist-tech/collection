## Table of contents

- [\Somnambulist\Collection\Behaviours\Mutate\AppendOnlyUniqueValues](#class-somnambulistcollectionbehavioursmutateappendonlyuniquevalues)
- [\Somnambulist\Collection\Behaviours\Mutate\RemoveValue](#class-somnambulistcollectionbehavioursmutateremovevalue)
- [\Somnambulist\Collection\Behaviours\Mutate\Clear](#class-somnambulistcollectionbehavioursmutateclear)
- [\Somnambulist\Collection\Behaviours\Mutate\ShuffleNewCollection](#class-somnambulistcollectionbehavioursmutateshufflenewcollection)
- [\Somnambulist\Collection\Behaviours\Mutate\MergeValues](#class-somnambulistcollectionbehavioursmutatemergevalues)
- [\Somnambulist\Collection\Behaviours\Mutate\CombineOnlyUniqueValues](#class-somnambulistcollectionbehavioursmutatecombineonlyuniquevalues)
- [\Somnambulist\Collection\Behaviours\Mutate\Shift](#class-somnambulistcollectionbehavioursmutateshift)
- [\Somnambulist\Collection\Behaviours\Mutate\Pad](#class-somnambulistcollectionbehavioursmutatepad)
- [\Somnambulist\Collection\Behaviours\Mutate\AppendValues](#class-somnambulistcollectionbehavioursmutateappendvalues)
- [\Somnambulist\Collection\Behaviours\Mutate\ReplaceValues](#class-somnambulistcollectionbehavioursmutatereplacevalues)
- [\Somnambulist\Collection\Behaviours\Mutate\Fill](#class-somnambulistcollectionbehavioursmutatefill)
- [\Somnambulist\Collection\Behaviours\Mutate\Shuffle](#class-somnambulistcollectionbehavioursmutateshuffle)
- [\Somnambulist\Collection\Behaviours\Mutate\Flip](#class-somnambulistcollectionbehavioursmutateflip)
- [\Somnambulist\Collection\Behaviours\Mutate\SetKeyValue](#class-somnambulistcollectionbehavioursmutatesetkeyvalue)
- [\Somnambulist\Collection\Behaviours\Mutate\Reverse](#class-somnambulistcollectionbehavioursmutatereverse)
- [\Somnambulist\Collection\Behaviours\Mutate\Pop](#class-somnambulistcollectionbehavioursmutatepop)
- [\Somnambulist\Collection\Behaviours\Mutate\RemapKeys](#class-somnambulistcollectionbehavioursmutateremapkeys)
- [\Somnambulist\Collection\Behaviours\Mutate\MergeOnlyUniqueValues](#class-somnambulistcollectionbehavioursmutatemergeonlyuniquevalues)
- [\Somnambulist\Collection\Behaviours\Mutate\UnionValues](#class-somnambulistcollectionbehavioursmutateunionvalues)
- [\Somnambulist\Collection\Behaviours\Mutate\CombineValues](#class-somnambulistcollectionbehavioursmutatecombinevalues)
- [\Somnambulist\Collection\Behaviours\Mutate\PrependOnlyUniqueValues](#class-somnambulistcollectionbehavioursmutateprependonlyuniquevalues)
- [\Somnambulist\Collection\Behaviours\Mutate\PrependValues](#class-somnambulistcollectionbehavioursmutateprependvalues)
- [\Somnambulist\Collection\Behaviours\Mutate\UnsetKey](#class-somnambulistcollectionbehavioursmutateunsetkey)
- [\Somnambulist\Collection\Behaviours\Mutate\UnionOnlyUniqueValues](#class-somnambulistcollectionbehavioursmutateuniononlyuniquevalues)

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\AppendOnlyUniqueValues

> Trait AppendOnlyUniqueValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>add(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Append the value to the collection</em> |
| public | <strong>append(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Add elements to the end of the collection</em> |
| public | <strong>concat(</strong><em>\iterable</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Push all of the given items onto the collection.</em> |
| public | <strong>push(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Alias of append</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\RemoveValue

> Trait RemoveValue

| Visibility | Function |
|:-----------|:---------|
| public | <strong>remove(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Remove the value from the collection</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\Clear

> Trait Clear

| Visibility | Function |
|:-----------|:---------|
| public | <strong>clear()</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Clear all elements from the collection</em> |
| public | <strong>reset()</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Alias of clear</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\ShuffleNewCollection

> Trait ShuffleNewCollection

| Visibility | Function |
|:-----------|:---------|
| public | <strong>shuffle()</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Shuffle the items in the collection; returning a new collection.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\MergeValues

> Trait MergeValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>merge(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Merges the supplied array into the current Collection Note: should only be used with Collections of the same data, may cause strange results otherwise. This method will re-index keys and overwrite existing values. If you wish to preserve keys and values see {@link append}.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\CombineOnlyUniqueValues

> Trait CombineOnlyUniqueValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>combine(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Create a collection by using this collection for keys and another for its values</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\Shift

> Trait Shift

| Visibility | Function |
|:-----------|:---------|
| public | <strong>shift()</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Remove the first value from the collection</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\Pad

> Trait Pad

| Visibility | Function |
|:-----------|:---------|
| public | <strong>pad(</strong><em>integer/\int</em> <strong>$size</strong>, <em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Pads the Collection to size using value as the value of the new elements</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\AppendValues

> Trait AppendValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>add(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Append the value to the collection</em> |
| public | <strong>append(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Add elements to the end of the collection</em> |
| public | <strong>concat(</strong><em>\iterable</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Push all of the given items onto the collection.</em> |
| public | <strong>push(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Alias of append</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\ReplaceValues

> Trait ReplaceValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>replace(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em> |
| public | <strong>replaceRecursively(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\Fill

> Trait Fill

| Visibility | Function |
|:-----------|:---------|
| public | <strong>fill(</strong><em>int</em> <strong>$start</strong>, <em>int</em> <strong>$count</strong>, <em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Fill an array with values beginning at index defined by start for count members Start can be a negative number. Count can be zero or more.</em> |
| public | <strong>fillKeysWith(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>For all values in the current Collection, use as a key and assign $value to them This should only be used with scalar values that can be used as array keys. A new Collection is returned with all previous values as keys, assigned the value.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\Shuffle

> Trait Shuffle

| Visibility | Function |
|:-----------|:---------|
| public | <strong>shuffle()</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Shuffle the items in the collection; does NOT return a new collection.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\Flip

> Trait Flip

| Visibility | Function |
|:-----------|:---------|
| public | <strong>flip()</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Exchange all values for keys and return new Collection Note: this should only be used with elements that can be used as valid PHP array keys.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\SetKeyValue

> Trait SetKeyValue

| Visibility | Function |
|:-----------|:---------|
| public | <strong>set(</strong><em>string</em> <strong>$key</strong>, <em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Add the value at the specified key/offset to the collection</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\Reverse

> Trait Reverse

| Visibility | Function |
|:-----------|:---------|
| public | <strong>reverse()</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Reverses the data in the Collection maintaining any keys</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\Pop

> Trait Pop

| Visibility | Function |
|:-----------|:---------|
| public | <strong>pop()</strong> : <em>mixed</em><br /><em>Pops the element off the end of the Collection</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\RemapKeys

> Trait RemapKeys

| Visibility | Function |
|:-----------|:---------|
| public | <strong>remapKeys(</strong><em>array</em> <strong>$map</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>From the provided map of key -> new_key; change the current key to new_key The previous key is unset from the collection.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\MergeOnlyUniqueValues

> Trait MergeOnlyUniqueValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>merge(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Merges the supplied array into the current Collection Note: should only be used with Collections of the same data, may cause strange results otherwise. This method will re-index keys and overwrite existing values. If you wish to preserve keys and values see {@link append}.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\UnionValues

> Trait UnionValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>union(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Union the collection with the given items.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\CombineValues

> Trait CombineValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>combine(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Create a collection by using this collection for keys and another for its values</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\PrependOnlyUniqueValues

> Trait PrependOnlyUniqueValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>prepend(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Prepends the elements to the beginning of the collection</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\PrependValues

> Trait PrependValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>prepend(</strong><em>mixed</em> <strong>$value</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Prepends the elements to the beginning of the collection</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\UnsetKey

> Trait UnsetKey

| Visibility | Function |
|:-----------|:---------|
| public | <strong>unset(</strong><em>string</em> <strong>$key</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Remove the key from the collection</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Mutate\UnionOnlyUniqueValues

> Trait UnionOnlyUniqueValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>union(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Mutate\static</em><br /><em>Union the collection with the given items.</em> |

