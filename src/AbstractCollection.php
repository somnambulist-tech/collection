<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use ArrayIterator;
use Somnambulist\Collection\Contracts\Collection;
use function array_key_exists;
use function count;

/**
 * Class AbstractCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\AbstractCollection
 */
abstract class AbstractCollection implements Collection
{

    /**
     * If true, any array will be wrapped in the current Collection type when accessed
     *
     * @var bool
     */
    public static $wrapArrays = true;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param mixed $items
     *
     * @return static
     */
    public static function collect($items = [])
    {
        return new static($items);
    }

    /**
     * @param mixed $items
     *
     * @return static
     */
    public static function new($items = [])
    {
        return new static($items);
    }

    /**
     * @param string $name
     *
     * @return mixed|static
     */
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

    /**
     * @return int
     */
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
        return array_key_exists($offset, $this->items);
    }

    public function offsetGet($offset)
    {
        $value = $this->items[$offset];

        if (static::$wrapArrays && is_array($value)) {
            $value = new static($value);
        }

        return $value;
    }
}
