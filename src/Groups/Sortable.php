<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Query\Sort;
use Somnambulist\Components\Collection\Behaviours\Query\SortKeys;
use Somnambulist\Components\Collection\Behaviours\Query\SortValues;

/**
 * Trait Sortable
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\Sortable
 */
trait Sortable
{

    use Sort;
    use SortKeys;
    use SortValues;

}
