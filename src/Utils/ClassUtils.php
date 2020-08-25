<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Utils;

use Closure;
use InvalidArgumentException;
use RuntimeException;
use Somnambulist\Collection\Contracts\Collection;
use function get_class;
use function is_object;
use function lcfirst;
use function method_exists;
use function preg_replace;
use function sprintf;
use function str_replace;
use function ucwords;

/**
 * Class ClassUtils
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\ClassUtils
 */
final class ClassUtils
{

    private function __construct() {}

    public static function ascii($string): string
    {
        return preg_replace("/[^A-Za-z0-9 \_\-]/", '', $string);
    }

    public static function camel($string): string
    {
        return lcfirst(static::studly($string));
    }

    public static function capitalize($string): string
    {
        return ucwords(str_replace(['-', '_'], ' ', $string));
    }

    public static function studly($string): string
    {
        return str_replace(' ', '', static::capitalize($string));
    }

    public static function assertClassImplements($class, $interface)
    {
        if (!in_array($interface, class_implements($class))) {
            throw new InvalidArgumentException(
                sprintf('The collection type "%s" does not implement "%s"', $class, $interface)
            );
        }
    }

    /**
     * Returns an accessor method for the object, if it is an object and it matches a pattern
     *
     * Will try the following patterns:
     *
     *  * test as-is
     *  * get + StudlyStringNoSpaces
     *  * camelStringNoSpaces
     *
     * @param mixed  $subject
     * @param string $test
     *
     * @return string|null
     */
    public static function getAccessMethodFor($subject, $test): ?string
    {
        if (!is_object($subject)) {
            return null;
        }

        foreach ([$test, 'get' . static::studly($test), static::camel($test)] as $try) {
            if (method_exists($subject, $try)) {
                return $try;
            }
        }

        return null;
    }

    /**
     * Gets the property name as used in the subject, only for objects
     *
     * Will try the following variations of property name:
     *
     *  * the property as-is
     *  * camelStringNoSpaces
     *  * StudlyStringNoSpaces
     *
     * @param object|array $subject
     * @param string       $property
     *
     * @return string
     */
    public static function getPropertyNameIn($subject, string $property): ?string
    {
        if (!is_object($subject)) {
            return null;
        }

        foreach ([$property, static::camel($property), static::studly($property)] as $try) {
            if (property_exists($subject, $try) || method_exists($subject, '__isset') && $subject->__isset($try)) {
                return $try;
            }
        }

        return null;
    }

    /**
     * Gets the value of the property from an object subject
     *
     * Returns null if the nothing was accessed, however the call may result in a null
     * response.
     *
     * @param object|array $subject
     * @param string       $property
     *
     * @return mixed
     */
    public static function getProperty($subject, string $property)
    {
        if (Value::isTraversable($subject) && Value::hasKey($subject, $property)) {
            return $subject[$property];
        }

        if (is_object($subject) && isset($subject->{$property})) {
            return $subject->{$property};
        }

        if (!$subject instanceof Collection && null !== $method = static::getAccessMethodFor($subject, $property)) {
            return $subject->{$method}();
        }

        return null;
    }

    /**
     * @param object|array $subject
     * @param string       $property
     *
     * @return bool
     */
    public static function hasProperty($subject, string $property): bool
    {
        if (Value::isTraversable($subject) && Value::hasKey($subject, $property)) {
            return true;
        }

        return null !== static::getPropertyNameIn($subject, $property);
    }

    /**
     * Attempts to set the property to value in subject
     *
     * @param object|array $subject
     * @param string       $property
     * @param mixed        $value
     */
    public static function setProperty(&$subject, string $property, $value): void
    {
        if (Value::isTraversable($subject) && Value::hasKey($subject, $property)) {
            $sub[$property] = $value;
            return;
        }

        if (null !== $prop = static::getPropertyNameIn($subject, $property)) {
            Closure::bind(function () use ($prop, $value) {
                $this->{$prop} = $value;
            }, $subject, $subject)();

            return;
        }

        throw new RuntimeException(
            sprintf(
                'Unable to set property "%s" (from %s) on object of type "%s"',
                $prop, $property, get_class($subject)
            )
        );
    }
}
