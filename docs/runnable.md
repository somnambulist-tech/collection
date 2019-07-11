## Table of contents

- [\Somnambulist\Collection\Behaviours\Pipes\RunCallableOnValues](#class-somnambulistcollectionbehaviourspipesruncallableonvalues)
- [\Somnambulist\Collection\Behaviours\Pipes\Pipeline](#class-somnambulistcollectionbehaviourspipespipeline)
- [\Somnambulist\Collection\Behaviours\Pipes\Pipe](#class-somnambulistcollectionbehaviourspipespipe)

<hr />

### Class: \Somnambulist\Collection\Behaviours\Pipes\RunCallableOnValues

> Trait RunCallableOnValues

| Visibility | Function |
|:-----------|:---------|
| public | <strong>each(</strong><em>\callable</em> <strong>$callback</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Pipes\static</em><br /><em>Execute a callback over the collection, halting if the callback returns false</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Pipes\Pipeline

> Trait Pipeline

| Visibility | Function |
|:-----------|:---------|
| public | <strong>pipeline(</strong><em>\iterable</em> <strong>$items</strong>, <em>string/callable</em> <strong>$through</strong>)</strong> : <em>\Somnambulist\Collection\Behaviours\Pipes\static</em><br /><em>Transform a passed Collection of items using an Operator method Given a set of Operators that all implement the same interface, pass the Collection of items to each Operator, calling a method on the operator that will transform each item in the items Collection, creating a new Collection that is passed to subsequent Operators. In other words, if the Collection contains e.g. decorators that will add / modify an entity, then `pipeline` will pass each item in turn through each decorator. Each time a new Collection is built from the output of the previous decorator. This allows chaining the decorator calls. A method name for the Operator can be used as the second argument, otherwise a callable must be provided that is passed: the operator object, an item from the items iterable and the key. The callable should return the transformed item. The created Collection preserves the keys, hence order, of the original items. This method can be used to modify a set of read-only objects via a series of independent, but linked transformations. This is similar to the pipeline pattern, except it works on a Collection instead of a single item.</em> |

<hr />

### Class: \Somnambulist\Collection\Behaviours\Pipes\Pipe

> Trait Pipe

| Visibility | Function |
|:-----------|:---------|
| public | <strong>pipe(</strong><em>\callable</em> <strong>$callback</strong>)</strong> : <em>mixed</em><br /><em>Pass the collection to the given callback and return the result</em> |

