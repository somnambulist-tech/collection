<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Pipes\Pipeline;
use Somnambulist\Collection\Behaviours\Pipes\RunCallableOnValues;
use Somnambulist\Collection\Behaviours\Pipes\Pipe;
use Somnambulist\Collection\Behaviours\Pipes\RunMethodOnValues;

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

    use RunCallableOnValues;
    use RunMethodOnValues;
    use Pipe;
    use Pipeline;

}
