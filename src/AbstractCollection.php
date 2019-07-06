<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use function array_key_exists;
use function count;
use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * Class AbstractCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\AbstractCollection
 */
abstract class AbstractCollection implements ArrayAccess, IteratorAggregate, Countable
{

    /**
     * @var array
     */
    protected $items = [];

    /**
     * Constructor.
     *
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    public function __isset($name)
    {
        return $this->offsetExists($name);
    }

    public static function __set_state($array)
    {
        $object        = new static();
        $object->items = $array['items'];

        return $object;
    }

    public function count()
    {
        return count($this->items);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($this->items, $offset);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }
}
