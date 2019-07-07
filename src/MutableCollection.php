<?php

declare(strict_types=1);

namespace Somnambulist\Collection;


use Somnambulist\Collection\Behaviours\Collection\MutableObjectAccess;
use Somnambulist\Collection\Behaviours\CanAddDuplicateAndRemoveItems;

/**
 * Class MutableCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\MutableCollection
 */
class MutableCollection extends AbstractCollection
{

    use CanAddDuplicateAndRemoveItems;
    use MutableObjectAccess;


}
