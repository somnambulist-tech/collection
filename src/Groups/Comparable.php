<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Compare\CanDiffCollections;
use Somnambulist\Collection\Behaviours\Compare\CanIntersect;

/**
 * Trait Comparable
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Comparable
 */
trait Comparable
{

    use CanDiffCollections;
    use CanIntersect;

}
