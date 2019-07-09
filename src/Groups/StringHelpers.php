<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Groups;

use Somnambulist\Collection\Behaviours\Strings\Capitalize;
use Somnambulist\Collection\Behaviours\Strings\Lower;
use Somnambulist\Collection\Behaviours\Strings\Trim;
use Somnambulist\Collection\Behaviours\Strings\Upper;

/**
 * Trait StringHelpers
 *
 * @package    Somnambulist\Collection\Groups
 * @subpackage Somnambulist\Collection\Groups\StringHelpers
 */
trait StringHelpers
{

    use Capitalize;
    use Lower;
    use Trim;
    use Upper;

}
