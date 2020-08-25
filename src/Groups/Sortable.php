<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Query\Sort;
use Somnambulist\Collection\Behaviours\Query\SortKeys;
use Somnambulist\Collection\Behaviours\Query\SortValues;

/**
 * Trait Sortable
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Sortable
 */
trait Sortable
{

    use Sort;
    use SortKeys;
    use SortValues;

}
