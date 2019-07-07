<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\CanApplyCallback;
use Somnambulist\Collection\Behaviours\CanDiffCollections;
use Somnambulist\Collection\Behaviours\CannotAddOrRemoveItems;
use Somnambulist\Collection\Behaviours\Serializable;
use Somnambulist\Collection\Contracts\Diffable as IsDiffable;
use Somnambulist\Collection\Contracts\Filterable as IsFilterable;
use Somnambulist\Collection\Contracts\ImmutableCollection as IsImmutable;
use Somnambulist\Collection\Contracts\Mappable as IsMappable;
use Somnambulist\Collection\Contracts\Serializable as IsSerializable;
use Somnambulist\Collection\Groups\Exportable;
use Somnambulist\Collection\Groups\Mappable;
use Somnambulist\Collection\Groups\Queryable;

/**
 * Class FrozenCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\FrozenCollection
 */
class FrozenCollection extends AbstractCollection implements IsImmutable, IsFilterable, IsMappable, IsDiffable, IsSerializable
{

    use CannotAddOrRemoveItems;
    use CanApplyCallback;
    use Queryable;
    use Mappable;
    use CanDiffCollections;
    use Exportable;
    use Serializable;

}
