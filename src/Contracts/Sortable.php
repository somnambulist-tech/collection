<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

use const SORT_STRING;

interface Sortable
{

    public function sort(string|callable $callable): Collection|static;

    /**
     * @param string $type Either values or keys, default values
     * @param string $dir  Either asc or desc, default asc
     * @param int    $comparison One of the SORT_ constants, default being SORT_STRING
     *
     * @return Collection|static
     */
    public function sortBy(string $type, string $dir = 'asc', int $comparison = SORT_STRING): Collection|static;
}
