<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\Assertion\CanAssert;
use Somnambulist\Collection\Behaviours\CanAddAndRemoveItems;
use Somnambulist\Collection\Behaviours\Export\ExportableToArray;
use Somnambulist\Collection\Behaviours\Export\ExportableToJson;
use Somnambulist\Collection\Behaviours\Export\ExportableToString;
use Somnambulist\Collection\Behaviours\MapReduce\CanCollapse;
use Somnambulist\Collection\Behaviours\MapReduce\CanMap;
use Somnambulist\Collection\Behaviours\Mutate\CanAppend;
use Somnambulist\Collection\Behaviours\Mutate\CanCombine;
use Somnambulist\Collection\Behaviours\Mutate\CanMerge;
use Somnambulist\Collection\Behaviours\Mutate\CanPop;
use Somnambulist\Collection\Behaviours\Mutate\CanPrepend;
use Somnambulist\Collection\Behaviours\Mutate\CanRemoveItem;
use Somnambulist\Collection\Behaviours\Mutate\CanRemoveKey;
use Somnambulist\Collection\Behaviours\Mutate\CanSetKey;
use Somnambulist\Collection\Behaviours\Mutate\CanShift;
use Somnambulist\Collection\Behaviours\Mutate\Clearable;
use Somnambulist\Collection\Behaviours\Pipes\CanEach;
use Somnambulist\Collection\Behaviours\Query\CanFilter;
use Somnambulist\Collection\Behaviours\Query\CanFilterKeys;
use Somnambulist\Collection\Behaviours\Query\CanGetAll;
use Somnambulist\Collection\Behaviours\Query\CanGetFirst;
use Somnambulist\Collection\Behaviours\Query\CanGetKey;
use Somnambulist\Collection\Behaviours\Query\CanGetLast;
use Somnambulist\Collection\Behaviours\Query\CanGetValue;
use Somnambulist\Collection\Behaviours\Query\CanGetValues;
use Somnambulist\Collection\Behaviours\Query\Contains;
use Somnambulist\Collection\Behaviours\Query\HasKey;
use Somnambulist\Collection\Behaviours\Query\Uniqueable;

/**
 * Class SimpleCollection
 *
 * A basic collection class that operates on it's own keys. Values can be duplicated.
 *
 * @package    Somnambulist\Collection
 * @subpackage Somnambulist\Collection\SimpleCollection
 */
class SimpleCollection extends AbstractCollection
{

    use CanAddAndRemoveItems;
    use CanAppend;
    use CanEach;
    use CanAssert;
    use CanCollapse;
    use CanCombine;
    use CanGetAll;
    use CanGetFirst;
    use CanGetKey;
    use CanGetLast;
    use CanGetValue;
    use CanGetValues;
    use CanFilter;
    use CanFilterKeys;
    use CanMap;
    use CanMerge;
    use CanRemoveItem;
    use CanRemoveKey;
    use CanPop;
    use CanPrepend;
    use CanSetKey;
    use CanShift;
    use Contains;
    use HasKey;
    use Clearable;
    use Uniqueable;

    use ExportableToString;
    use ExportableToArray;
    use ExportableToJson;
}
