<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Groups;

use Somnambulist\Components\Collection\Behaviours\Strings\Capitalize;
use Somnambulist\Components\Collection\Behaviours\Strings\Lower;
use Somnambulist\Components\Collection\Behaviours\Strings\Trim;
use Somnambulist\Components\Collection\Behaviours\Strings\Upper;

/**
 * Trait StringHelpers
 *
 * @package    Somnambulist\Components\Collection\Groups
 * @subpackage Somnambulist\Components\Collection\Groups\StringHelpers
 */
trait StringHelpers
{

    use Capitalize;
    use Lower;
    use Trim;
    use Upper;

}
