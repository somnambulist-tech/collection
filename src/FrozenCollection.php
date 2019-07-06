<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\Immutable\ImmutableArrayAccess;
use Somnambulist\Collection\Behaviours\Immutable\ImmutableObjectAccess;
use Somnambulist\Collection\Contracts\ImmutableCollection;

/**
 * Class FrozenCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\FrozenCollection
 */
class FrozenCollection extends AbstractCollection implements ImmutableCollection
{

    use ImmutableArrayAccess;
    use ImmutableObjectAccess;


}
