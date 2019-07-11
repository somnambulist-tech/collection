<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Query\FilterValues;
use Somnambulist\Collection\Behaviours\Query\FilterByKey;

/**
 * Trait Filterable
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Filterable
 */
trait Filterable
{

    use FilterValues;
    use FilterByKey;

}
