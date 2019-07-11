<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Compare\DiffKeys;
use Somnambulist\Collection\Behaviours\Compare\DiffValues;
use Somnambulist\Collection\Behaviours\Compare\Intersect;

/**
 * Trait Comparable
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Comparable
 */
trait Comparable
{

    use DiffKeys;
    use DiffValues;
    use Intersect;

}
