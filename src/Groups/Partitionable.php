<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Partition\GroupBy;
use Somnambulist\Components\Collection\Behaviours\Partition\Partition;
use Somnambulist\Components\Collection\Behaviours\Partition\Slice;
use Somnambulist\Components\Collection\Behaviours\Partition\Splice;

trait Partitionable
{

    use GroupBy;
    use Partition;
    use Slice;
    use Splice;

}
