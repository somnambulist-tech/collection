## Table of contents

- [\Somnambulist\Collection\Behaviours\Aggregate\AggregateValues](#class-somnambulistcollectionbehavioursaggregateaggregatevalues)
- [\Somnambulist\Collection\Behaviours\Aggregate\CountBy](#class-somnambulistcollectionbehavioursaggregatecountby)

<hr />

### Class: \Somnambulist\Collection\Behaviours\Aggregate\AggregateValues

> Trait AggregateValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>average(</strong><em>null/string/callable</em> <strong>$key=null</strong>)</strong> : <em>float/int</em><br /><em>Returns the average of all values from the collection using the key</em> |
| public | <strong>max(</strong><em>null/string/callable</em> <strong>$key=null</strong>)</strong> : <em>float/int</em><br /><em>Returns the highest value from the collection of values Key can be a string key or callable. Based on Laravel: Illuminate\Support\Collection.max</em> |
| public | <strong>median(</strong><em>null/string/callable</em> <strong>$key=null</strong>)</strong> : <em>float/int</em><br /><em>Returns the median value of the min/max from the key</em> |
| public | <strong>min(</strong><em>null/string/callable</em> <strong>$key=null</strong>)</strong> : <em>float/int</em><br /><em>Returns the lowest value from the collection of values Key can be a string key or callable. Based on Laravel: Illuminate\Support\Collection.min</em> |
| public | <strong>modal(</strong><em>null/string/callable</em> <strong>$key=null</strong>)</strong> : <em>mixed</em><br /><em>Returns the modal (most frequent) value from the collection based on the key In the case of a single modal, returns that value (int/float). In the case of several modals, returns an array of each value If every value is a modal, returns false. If you have many modals, consider grouping by occurrence instead.</em> |
| public | <strong>sum(</strong><em>null/string/callable</em> <strong>$key=null</strong>)</strong> : <em>float/int</em><br /><em>Sum items in the collection, optionally matching the key / callable Based on Laravel: Illuminate\Support\Collection.sum</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Aggregate\CountBy

> Trait CountBy

| Visibility | Function |
|:-----------|:---------|
| public | <strong>countBy(</strong><em>callable/null</em> <strong>$callback=null</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Aggregate\static</em><br /><em>Count the number of items in the collection using a given test</em> |

