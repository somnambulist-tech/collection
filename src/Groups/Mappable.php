<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\MapReduce\Collapse;
use Somnambulist\Components\Collection\Behaviours\MapReduce\FlatMap;
use Somnambulist\Components\Collection\Behaviours\MapReduce\Flatten;
use Somnambulist\Components\Collection\Behaviours\MapReduce\Map;
use Somnambulist\Components\Collection\Behaviours\MapReduce\MapInto;
use Somnambulist\Components\Collection\Behaviours\MapReduce\Reduce;

/**
 * Trait Mappable
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\Mappable
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
