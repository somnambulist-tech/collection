<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Pipes\Pipe;
use Somnambulist\Components\Collection\Behaviours\Pipes\Pipeline;
use Somnambulist\Components\Collection\Behaviours\Pipes\RunCallableOnValues;
use Somnambulist\Components\Collection\Behaviours\Pipes\RunMethodOnValues;

/**
 * Runnable
 *
 * Groups methods that call functions, methods or allow callables to operate
 * on the collection e.g. run(), pipe() etc.
 */
trait Runnable
{

    use RunCallableOnValues;
    use RunMethodOnValues;
    use Pipe;
    use Pipeline;

}
