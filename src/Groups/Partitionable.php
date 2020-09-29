<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Partition\GroupBy;
use Somnambulist\Components\Collection\Behaviours\Partition\Partition;
use Somnambulist\Components\Collection\Behaviours\Partition\Slice;
use Somnambulist\Components\Collection\Behaviours\Partition\Splice;

/**
 * Trait Partitionable
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\Partitionable
 */
trait Partitionable
{

    use GroupBy;
    use Partition;
    use Slice;
    use Splice;

}
