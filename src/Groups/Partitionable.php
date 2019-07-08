<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Partition\CanGroupBy;
use Somnambulist\Collection\Behaviours\Partition\CanPartition;
use Somnambulist\Collection\Behaviours\Partition\CanSlice;
use Somnambulist\Collection\Behaviours\Partition\CanSplice;

/**
 * Trait Partitionable
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Partitionable
 */
trait Partitionable
{

    use CanGroupBy;
    use CanPartition;
    use CanSlice;
    use CanSplice;

}
