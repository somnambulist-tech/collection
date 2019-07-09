<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Partition\GroupBy;
use Somnambulist\Collection\Behaviours\Partition\Partition;
use Somnambulist\Collection\Behaviours\Partition\Slice;
use Somnambulist\Collection\Behaviours\Partition\Splice;

/**
 * Trait Partitionable
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Partitionable
 */
trait Partitionable
{

    use GroupBy;
    use Partition;
    use Slice;
    use Splice;

}
