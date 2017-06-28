Change Log
==========

2017-06-28
----------

 * added extract()
 * refactored unit tests to reduce the size off the main test file

2017-06-27
----------

 * added shuffle() (thanks to @paulmaclean)

2017-06-23
----------

 * changed each() to mirror other Collection each implementations - BC break!
 * changed methods that accept arrays to use convertToArray()
 * changed call() to transform() - call() is now deprecated
 * removed all previously deprecated methods
 * removed static factory methods to a factory class (except collect())
 * removed modified flag
 * added assert()
 * added only()
 * added partition()
 * added value()
 * extracted some method groups into traits

2017-04-17
----------

 * added lower, upper, intersect, trim, diff, diffKeys, fill, fillKeysWith, explode, collectionFromString, toJson
 * re-ordered methods to group PHP interface methods together
 * moved other methods into (mostly) alphabetical order
 * moved deprecated methods together

2017-04-15
----------

 * added min, max and sum; loosely based on Laravels Collection methods of the same name
 * added additional unit tests
 * cleaned up offsetSet and fixed bug where null offset was not correctly handled
 
2017-03-20
----------

 * fixed serialization bug with Immutable collections

2017-02-17
----------

 * fixed bug in filter not passing the flag through
 * added except for excluding keys
 * added call as an alternative to walk / each that uses a more standard callable
 * added documentation for callables
 * removed unneeded docblocks
 * cleaned up some argument names and internal naming
 * marked findByRegex, isValueInSet and addIfNotInSet as deprecated

2017-01-22
----------

 * addition of pop, shift, slice and each
 * fixed Immutable

2017-01-22
----------

Initial commit, forked from domain input mapper.
