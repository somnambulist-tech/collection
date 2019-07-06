<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Utils;

/**
 * Class ClassUtils
 *
 * @package    Somnambulist\Collection\Utils
 * @subpackage Somnambulist\Collection\Utils\ClassUtils
 */
final class ClassUtils
{

    private function __construct() {}

    /**
     * Returns an accessor method for the object, if it is an object and it matches a pattern
     *
     * Will try the following patterns:
     *
     *  * test as-is
     *  * get + CapitalizedStringNoSpaces
     *  * camelizedStringNoSpaces
     *
     * @param mixed  $subject
     * @param string $test
     *
     * @return string|null
     */
    public static function getAccessMethodFor($subject, $test): ?string
    {
        foreach ([$test, 'get' . static::capitalize($test), static::camel($test)] as $try) {
            if (is_object($subject) && method_exists($subject, $try)) {
                return $try;
            }
        }

        return null;
    }

    public static function ascii($string): string
    {
        return preg_replace("/[^A-Za-z0-9 \_\-]/", '', $string);
    }

    public static function capitalize($string): string
    {
        return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $string)));
    }

    public static function camel($string): string
    {
        return lcfirst(static::camel($string));
    }
}
