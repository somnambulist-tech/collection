<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\CanAddAndRemoveItems;
use Somnambulist\Collection\Behaviours\CanApplyCallback;
use Somnambulist\Collection\Behaviours\CanDiffCollections;
use Somnambulist\Collection\Behaviours\Freezeable;
use Somnambulist\Collection\Behaviours\Serializable;
use Somnambulist\Collection\Behaviours\Sortable;
use Somnambulist\Collection\Contracts\Diffable as IsDiffable;
use Somnambulist\Collection\Contracts\Filterable as IsFilterable;
use Somnambulist\Collection\Contracts\Freezable as IsFreezable;
use Somnambulist\Collection\Contracts\Mappable as IsMappable;
use Somnambulist\Collection\Contracts\MutableCollection as IsMutable;
use Somnambulist\Collection\Contracts\Serializable as IsSerializable;
use Somnambulist\Collection\Contracts\Sortable as IsSortable;
use Somnambulist\Collection\Groups\Exportable;
use Somnambulist\Collection\Groups\Mappable;
use Somnambulist\Collection\Groups\Mutable;
use Somnambulist\Collection\Groups\Queryable;

/**
 * Class MutableCollection
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\MutableCollection
 */
class MutableCollection extends AbstractCollection implements IsMutable, IsFilterable, IsMappable, IsDiffable, IsFreezable, IsSerializable, IsSortable
{

    use CanAddAndRemoveItems;
    use CanApplyCallback;
    use CanDiffCollections;
    use Exportable;
    use Freezeable;
    use Mappable;
    use Mutable;
    use Queryable;
    use Serializable;
    use Sortable;

}
