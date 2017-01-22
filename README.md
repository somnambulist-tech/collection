## Collection Library

Provides a Collection container with no dependencies on any framework code. The collection is a
wrapper around a standard array with many helper methods. It sits somewhere between a Laravel
Collection and the Doctrine ArrayCollection.

### Requirements

 * PHP 5.6+

### Installation

Install using composer, or checkout / pull the files from github.com.

 * composer require somnambulist/collection

### Collection Types

There is a single collection implementation with an extended version providing an immutable
collection i.e.: once created you cannot change the collection. You can still change the
contents if they are objects, but the number of items is fixed.
