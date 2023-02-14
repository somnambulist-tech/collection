<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Export;

use function http_build_query;

/**
 * @property array $items
 */
trait ExportToQueryString
{

    /**
     * Returns a HTTP query string of the values
     *
     * Note: should only be used with elements that can be cast to scalars.
     *
     * @link https://www.php.net/http_build_query
     *
     * @param string $separator
     * @param int    $encoding
     *
     * @return string
     */
    public function toQueryString(string $separator = '&', int $encoding = PHP_QUERY_RFC3986): string
    {
        return http_build_query($this->toArray(), '', $separator, $encoding);
    }
}
