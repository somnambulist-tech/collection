<?php

declare(strict_types=1);

namespace Somnambulist\Collection;


use Somnambulist\Collection\Behaviours\Collection\MutableArrayAccess;
use Somnambulist\Collection\Behaviours\Collection\MutableObjectAccess;

/**
 * Class MutableCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\MutableCollection
 */
class MutableCollection extends AbstractCollection
{

    use MutableArrayAccess;
    use MutableObjectAccess;


}
