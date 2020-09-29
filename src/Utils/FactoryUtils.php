<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Utils;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\MutableCollection;

/**
 * Class FactoryUtils
 *
 * @package    Somnambulist\Components\Collection\Utils
 * @subpackage Somnambulist\Components\Collection\Utils\FactoryUtils
 */
final class FactoryUtils
{

    private function __construct() {}

    /**
     * Creates a new collection instance with a nested array from the key
     *
     * @param string $key
     * @param mixed  $value
     * @param string $type
     *
     * @return Collection
     */
    public static function createWithNestedArrayFromKey(string $key, $value, string $type = MutableCollection::class): Collection
    {
        ClassUtils::assertClassImplements($type, Collection::class);

        $array = [];
        $keys  = explode('.', $key);

        while (count($keys) > 1) {
            $key = array_shift($keys);

            if (!isset($array[$key]) || !is_array($array[$key])) {
                $array[$key] = [];
            }

            $array = &$array[$key];
        }

        $array[array_shift($keys)] = $value;

        return new $type($array);
    }

    /**
     * Creates a new collection for a string that describes key values
     *
     * E.g.: a URL query string: var=value&var2=value2
     * E.g.: a pipe delimited string: op|op2:2,3|another:true
     *
     * @param string $string
     * @param string $separator  String that separates parameters
     * @param string $assignment String that signifies value assignment (if missing is true)
     * @param string $options    String for multiple items per assignment
     * @param string $type
     *
     * @return Collection
     */
    public static function createFromString(
        string $string,
        string $separator = '&',
        string $assignment = '=',
        string $options = ',',
        string $type = MutableCollection::class
    ): Collection
    {
        ClassUtils::assertClassImplements($type, Collection::class);

        $collection = [];

        if (strlen(trim($string)) > 0) {
            static::explode($string, $separator, $type)
                ->each(function ($item) use ($type, $assignment, $options, &$collection) {
                    if (false === strpos($item, $assignment)) {
                        $collection[trim($item)] = true;

                        return;
                    }

                    [$key, $value] = explode($assignment, $item);

                    if (false !== strpos($value, $options)) {
                        $value = static::explode($value, $options, $type)->map('trim')->toArray();
                    }

                    $collection[trim($key)] = $value;
                })
            ;
        }

        return new $type($collection);
    }

    /**
     * Creates a new collection by exploding the string using a delimiter
     *
     * @link https://www.php.net/parse_ini_string
     *
     * @param string $ini
     * @param bool   $sections (optional) Process sections and return a multi-dimensional array
     * @param int    $mode     (optional) INI_SCANNER constant
     * @param string $type
     *
     * @return Collection
     */
    public static function createFromIniString(
        string $ini,
        bool $sections = false,
        $mode = INI_SCANNER_NORMAL,
        string $type = MutableCollection::class
    ): Collection
    {
        ClassUtils::assertClassImplements($type, Collection::class);

        return new $type(parse_ini_string($ini, $sections, $mode));
    }

    /**
     * Creates a new collection by parsing the url, will also process the query components
     *
     * @link https://www.php.net/parse_url
     *
     * @param string $url
     * @param string $type
     *
     * @return Collection
     */
    public static function createFromUrl(string $url, string $type = MutableCollection::class): Collection
    {
        ClassUtils::assertClassImplements($type, Collection::class);

        $url          = parse_url($url);
        $url['query'] = static::createFromUrlQuery($url['query'], $type);

        return new $type($url);
    }

    /**
     * Creates a new collection from a URL query string
     *
     * @link https://www.php.net/parse_url
     *
     * @param string $url
     * @param string $type
     *
     * @return Collection
     */
    public static function createFromUrlQuery(string $url, string $type = MutableCollection::class): Collection
    {
        ClassUtils::assertClassImplements($type, Collection::class);

        $array = [];
        parse_str($url, $array);

        return new $type($array);
    }

    /**
     * Creates a new collection by exploding the string using a delimiter
     *
     * @link https://www.php.net/explode
     *
     * @param string $string
     * @param string $delimiter
     * @param string $type
     *
     * @return Collection
     */
    public static function explode(string $string, string $delimiter, string $type = MutableCollection::class): Collection
    {
        ClassUtils::assertClassImplements($type, Collection::class);

        return new $type(explode($delimiter, $string));
    }
}
