<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Query\FilterByKey;
use Somnambulist\Components\Collection\Behaviours\Query\FilterValues;

/**
 * Trait Filterable
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\Filterable
 */
trait Filterable
{

    use FilterValues;
    use FilterByKey;

}
