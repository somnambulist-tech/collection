<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\MapReduce\Collapse;
use Somnambulist\Collection\Behaviours\MapReduce\FlatMap;
use Somnambulist\Collection\Behaviours\MapReduce\Flatten;
use Somnambulist\Collection\Behaviours\MapReduce\Map;
use Somnambulist\Collection\Behaviours\MapReduce\MapInto;
use Somnambulist\Collection\Behaviours\MapReduce\Reduce;

/**
 * Trait Mappable
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Mappable
 */
trait Mappable
{

    use Collapse;
    use FlatMap;
    use Flatten;
    use Map;
    use MapInto;
    use Reduce;

}
