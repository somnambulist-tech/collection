<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Query\CanFilter;
use Somnambulist\Collection\Behaviours\Query\CanFilterKeys;

/**
 * Trait Filterable
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Filterable
 */
trait Filterable
{

    use CanFilter;
    use CanFilterKeys;

}
