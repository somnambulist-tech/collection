<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Somnambulist\Collection;

/**
 * Class CollectionFactory
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\CollectionFactory
 */
final class Factory
{

    /**
     * Ensures passed var is an array
     *
     * @param mixed   $var
     * @param boolean $deep
     *
     * @return array
     */
    public static function convertToArray($var, $deep = false)
    {
        if (null === $var) {
            return [];
        }
        if (is_scalar($var)) {
            return [$var];
        }
        if (is_object($var)) {
            if ($var instanceof \stdClass) {
                $var = (array)$var;
            } elseif ($var instanceof \Iterator) { // @codeCoverageIgnore
                $var = iterator_to_array($var);
            } elseif ($var instanceof \ArrayObject) { // @codeCoverageIgnore
                $var = $var->getArrayCopy();
            } elseif (method_exists($var, 'toArray')) {
                $var = $var->toArray();
            } elseif (method_exists($var, 'asArray')) {
                $var = $var->asArray();
            } elseif (method_exists($var, 'toJson')) {
                $var = json_decode($var->toJson(), true);
            } elseif (method_exists($var, 'asJson')) {
                $var = json_decode($var->asJson(), true);
            }

            return $var;
        }
        if (is_array($var)) {
            if ($deep) {
                foreach ($var as &$item) {
                    $item = static::convertToArray($item, true);
                }
            }

            return $var;
        }

        return [$var]; // @codeCoverageIgnore
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
     *
     * @return Collection
     */
    public static function collectionFromString($string, $separator = '&', $assignment = '=', $options = ',')
    {
        $collection = [];

        if ( strlen(trim($string)) > 0 ) {
            static::explode($string, $separator)
                ->each(function ($item) use ($assignment, $options, &$collection) {
                    if (false === strpos($item, $assignment)) {
                        $collection[trim($item)] = true;
                        return;
                    }

                    list($key, $value) = explode($assignment, $item);

                    if (false !== strpos($value, $options)) {
                        $value = static::explode($value, $options)->trim()->toArray();
                    }

                    $collection[trim($key)] = $value;
                })
            ;
        }

        return new Collection($collection);
    }

    /**
     * Creates a new collection by exploding the string using a delimiter
     *
     * @link http://ca.php.net/parse_ini_string
     *
     * @param string $ini
     * @param bool   $sections (optional) Process sections and return a multi-dimensional array
     * @param int    $mode     (optional) INI_SCANNER constant
     *
     * @return Collection
     */
    public static function collectionFromIniString($ini, $sections = false, $mode = INI_SCANNER_NORMAL)
    {
        return new Collection(parse_ini_string($ini, $sections, $mode));
    }

    /**
     * Creates a new collection by parsing the url, will also process the query components
     *
     * @link http://ca.php.net/parse_url
     *
     * @param string $url
     *
     * @return Collection
     */
    public static function collectionFromUrl($url)
    {
        $url = Collection::collect(parse_url($url));
        $url->set('query', static::collectionFromUrlQuery($url->get('query')));

        return $url;
    }

    /**
     * Creates a new collection from a URL query string
     *
     * @link http://ca.php.net/parse_url
     *
     * @param string $url
     *
     * @return Collection
     */
    public static function collectionFromUrlQuery($url)
    {
        $array = [];
        parse_str($url, $array);

        return new Collection($array);
    }

    /**
     * Creates a new collection by exploding the string using a delimiter
     *
     * @link http://ca.php.net/explode
     *
     * @param string $string
     * @param string $delimiter
     *
     * @return Collection
     */
    public static function explode($string, $delimiter)
    {
        return new Collection(explode($delimiter, $string));
    }
}
