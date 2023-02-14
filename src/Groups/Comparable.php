<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Compare\DiffKeys;
use Somnambulist\Components\Collection\Behaviours\Compare\DiffValues;
use Somnambulist\Components\Collection\Behaviours\Compare\Intersect;

trait Comparable
{

    use DiffKeys;
    use DiffValues;
    use Intersect;

}
