Change Log
==========

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
