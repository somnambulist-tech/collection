<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use ArrayIterator;
use Somnambulist\Collection\Contracts\Collection;
use function array_key_exists;
use function count;
use Somnambulist\Collection\Utils\ClassUtils;

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
     * The type of collection to create when new collections are needed
     *
     * Must be a Collection interface class. This is required for the Set, where operations
     * can result in duplicate values and that is the expected behaviour, but allowing a
     * different type of collection is useful e.g.: return a limited set after filtering.
     *
     * @var string
     */
    protected static $collectionClass;

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
    public static function create($items = [])
    {
        return new static($items);
    }

    /**
     * @param string $class
     */
    public static function setCollectionClass(string $class): void
    {
        ClassUtils::assertClassImplements($class, Collection::class);

        static::$collectionClass = $class;
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

    /**
     * @param array|mixed $items
     *
     * @return static|Collection
     */
    public function new($items)
    {
        if (is_null(static::$collectionClass)) {
            static::$collectionClass = static::class;
        }

        return new static::$collectionClass($items);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }

    public function offsetGet($offset)
    {
        $value = $this->items[$offset];

        if (static::$wrapArrays && is_array($value)) {
            $value = $this->new($value);
        }

        return $value;
    }
}
