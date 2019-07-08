<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Pipes\CanEach;
use Somnambulist\Collection\Behaviours\Pipes\CanPipe;
use Somnambulist\Collection\Behaviours\Pipes\CanRun;

/**
 * Trait Runnable
 *
 * Groups methods that call functions, methods or allow callables to operate
 * on the collection e.g. run(), pipe() etc.
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\Runnable
 */
trait Runnable
{

    use CanEach;
    use CanRun;
    use CanPipe;

}
