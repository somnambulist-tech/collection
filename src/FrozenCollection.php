<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\CannotAddOrRemoveItems;
use Somnambulist\Collection\Behaviours\ExportableToArray;
use Somnambulist\Collection\Behaviours\ExportableToJson;
use Somnambulist\Collection\Behaviours\ExportableToString;
use Somnambulist\Collection\Contracts\ImmutableCollection;

/**
 * Class FrozenCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\FrozenCollection
 */
class FrozenCollection extends AbstractCollection implements ImmutableCollection
{

    use CannotAddOrRemoveItems;
    use ExportableToArray;
    use ExportableToJson;
    use ExportableToString;

}
