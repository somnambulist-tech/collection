## Table of contents

- [\Somnambulist\Components\Collection\Behaviours\Partition\Splice](#class-somnambulistcomponentscollectionbehaviourspartitionsplice)
- [\Somnambulist\Components\Collection\Behaviours\Partition\Partition](#class-somnambulistcomponentscollectionbehaviourspartitionpartition)
- [\Somnambulist\Components\Collection\Behaviours\Partition\Slice](#class-somnambulistcomponentscollectionbehaviourspartitionslice)
- [\Somnambulist\Components\Collection\Behaviours\Partition\GroupBy](#class-somnambulistcomponentscollectionbehaviourspartitiongroupby)

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Partition\Splice

> Trait Splice

| Visibility | Function |
|:-----------|:---------|
| public | <strong>splice(</strong><em>int</em> <strong>$offset</strong>, <em>int/null</em> <strong>$length=null</strong>, <em>array/mixed</em> <strong>$replacement=array()</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Partition\static</em><br /><em>Splice a portion of the underlying collection</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Partition\Partition

> Trait Partition

| Visibility | Function |
|:-----------|:---------|
| public | <strong>partition(</strong><em>callable/string</em> <strong>$callback</strong>)</strong> : <em>static[static, static]</em><br /><em>Partition the Collection into two Collections using the given callback or key. Based on Laravel: Illuminate\Support\Collection.partition</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Partition\Slice

> Trait Slice

| Visibility | Function |
|:-----------|:---------|
| public | <strong>slice(</strong><em>int</em> <strong>$offset</strong>, <em>int/null</em> <strong>$limit=null</strong>, <em>bool</em> <strong>$keys=true</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Partition\static</em><br /><em>Extracts a portion of the Collection, returning a new Collection By default, preserves the keys.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Partition\GroupBy

> Trait GroupBy

| Visibility | Function |
|:-----------|:---------|
| public | <strong>groupBy(</strong><em>\callable</em> <strong>$criteria</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Partition\static</em><br /><em>Group the elements in the collection by the callable, returning a new collection The callable should return a valid key to group elements into. A valid key is a string or integer or the current rules of PHP. Each group is a collection of the values matched to it.</em> |

