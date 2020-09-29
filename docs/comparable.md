## Table of contents

- [\Somnambulist\Components\Collection\Behaviours\Compare\DiffValues](#class-somnambulistcomponentscollectionbehaviourscomparediffvalues)
- [\Somnambulist\Components\Collection\Behaviours\Compare\Intersect](#class-somnambulistcomponentscollectionbehaviourscompareintersect)
- [\Somnambulist\Components\Collection\Behaviours\Compare\DiffKeys](#class-somnambulistcomponentscollectionbehaviourscomparediffkeys)

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Compare\DiffValues

> Trait DiffValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>diff(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Compare\static</em><br /><em>Get the items in the collection that are not present in the given items.</em> |
| public | <strong>diffAssoc(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Compare\static</em><br /><em>Get the items in the collection whose keys and values are not present in the given items.</em> |
| public | <strong>diffAssocUsing(</strong><em>mixed</em> <strong>$items</strong>, <em>\callable</em> <strong>$callback</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Compare\static</em><br /><em>Get the items in the collection whose keys and values are not present in the given items.</em> |
| public | <strong>diffUsing(</strong><em>mixed</em> <strong>$items</strong>, <em>\callable</em> <strong>$callback</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Compare\static</em><br /><em>Get the items in the collection that are not present in the given items.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Compare\Intersect

> Trait Intersect

| Visibility | Function |
|:-----------|:---------|
| public | <strong>intersect(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Compare\static</em><br /><em>Intersect the collection with the given items.</em> |
| public | <strong>intersectByKeys(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Compare\static</em><br /><em>Intersect the collection with the given items by key.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Compare\DiffKeys

> Trait DiffKeys

| Visibility | Function |
|:-----------|:---------|
| public | <strong>diffKeys(</strong><em>mixed</em> <strong>$items</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Compare\static</em><br /><em>Get the items in the collection whose keys are not present in the given items.</em> |
| public | <strong>diffKeysUsing(</strong><em>mixed</em> <strong>$items</strong>, <em>\callable</em> <strong>$callback</strong>)</strong> : <em>\Somnambulist\Components\Collection\Behaviours\Compare\static</em><br /><em>Get the items in the collection whose keys are not present in the given items.</em> |

