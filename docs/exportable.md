## Table of contents

- [\Somnambulist\Components\Collection\Behaviours\Export\Serializable](#class-somnambulistcomponentscollectionbehavioursexportserializable)
- [\Somnambulist\Components\Collection\Behaviours\Export\ExportToString](#class-somnambulistcomponentscollectionbehavioursexportexporttostring)
- [\Somnambulist\Components\Collection\Behaviours\Export\ExportToJson](#class-somnambulistcomponentscollectionbehavioursexportexporttojson)
- [\Somnambulist\Components\Collection\Behaviours\Export\ExportToArray](#class-somnambulistcomponentscollectionbehavioursexportexporttoarray)
- [\Somnambulist\Components\Collection\Behaviours\Export\JsonSerialize](#class-somnambulistcomponentscollectionbehavioursexportjsonserialize)
- [\Somnambulist\Components\Collection\Behaviours\Export\ExportToQueryString](#class-somnambulistcomponentscollectionbehavioursexportexporttoquerystring)

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Export\Serializable

> Trait Serializable

| Visibility | Function |
|:-----------|:---------|
| public | <strong>serialize()</strong> : <em>string</em> |
| public | <strong>unserialize(</strong><em>string</em> <strong>$serialized</strong>)</strong> : <em>void</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Export\ExportToString

> Trait ExportToString

| Visibility | Function |
|:-----------|:---------|
| public | <strong>implode(</strong><em>string</em> <strong>$glue=`','`</strong>, <em>null/string/\Somnambulist\Components\Collection\Behaviours\Export\Closure</em> <strong>$value=null</strong>, <em>null/string</em> <strong>$withKeys=null</strong>)</strong> : <em>string</em><br /><em>Implodes all the values into a single string, objects should support __toString If a specific value is specified it will be pulled from any sub-arrays or objects; alternatively it can be a closure to fetch specific properties from any objects in the collection. If $withKeys is set to a string, it will prefix the string value with the key and the $withKeys string.</em> |
| public | <strong>toString()</strong> : <em>string</em><br /><em>Converts the collection to a JSON string</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Export\ExportToJson

> Trait ExportToJson

| Visibility | Function |
|:-----------|:---------|
| public | <strong>toJson(</strong><em>\int</em> <strong>$options</strong>)</strong> : <em>string</em><br /><em>Return the collection as a JSON string, uses toArray to convert to an Array</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Export\ExportToArray

> Trait ExportToArray

| Visibility | Function |
|:-----------|:---------|
| public | <strong>toArray()</strong> : <em>array</em><br /><em>Convert the collection and any nested data to an array Note: some objects may fail to convert to arrays if they do not have appropriate export / array methods.</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Export\JsonSerialize

> Trait JsonSerialize

| Visibility | Function |
|:-----------|:---------|
| public | <strong>JsonSerialize()</strong> : <em>array</em><br /><em>Returns the collection in a form suitable for encoding to JSON</em> |

<hr />

### Class: \Somnambulist\Components\Collection\Behaviours\Export\ExportToQueryString

> Trait ExportToQueryString

| Visibility | Function |
|:-----------|:---------|
| public | <strong>toQueryString(</strong><em>string</em> <strong>$separator=`'&'`</strong>, <em>int</em> <strong>$encoding=2</strong>)</strong> : <em>string</em><br /><em>Returns a HTTP query string of the values Note: should only be used with elements that can be cast to scalars.</em> |

