<?php

declare(strict_types=1);

namespace Somnambulist\Collection;

use Somnambulist\Collection\Behaviours\CanAddAndRemoveItems;
use Somnambulist\Collection\Behaviours\CanAppend;
use Somnambulist\Collection\Behaviours\CanApplyCallback;
use Somnambulist\Collection\Behaviours\CanAssert;
use Somnambulist\Collection\Behaviours\CanCollapse;
use Somnambulist\Collection\Behaviours\CanCombine;
use Somnambulist\Collection\Behaviours\CanFilter;
use Somnambulist\Collection\Behaviours\CanFilterKeys;
use Somnambulist\Collection\Behaviours\CanGetAll;
use Somnambulist\Collection\Behaviours\CanGetFirst;
use Somnambulist\Collection\Behaviours\CanGetKey;
use Somnambulist\Collection\Behaviours\CanGetLast;
use Somnambulist\Collection\Behaviours\CanGetValue;
use Somnambulist\Collection\Behaviours\CanGetValues;
use Somnambulist\Collection\Behaviours\CanMap;
use Somnambulist\Collection\Behaviours\CanMerge;
use Somnambulist\Collection\Behaviours\CanPop;
use Somnambulist\Collection\Behaviours\CanPrepend;
use Somnambulist\Collection\Behaviours\CanRemoveItem;
use Somnambulist\Collection\Behaviours\CanRemoveKey;
use Somnambulist\Collection\Behaviours\CanSetKey;
use Somnambulist\Collection\Behaviours\CanShift;
use Somnambulist\Collection\Behaviours\Contains;
use Somnambulist\Collection\Behaviours\ExportableToArray;
use Somnambulist\Collection\Behaviours\ExportableToJson;
use Somnambulist\Collection\Behaviours\ExportableToString;
use Somnambulist\Collection\Behaviours\HasKey;
use Somnambulist\Collection\Behaviours\Clearable;
use Somnambulist\Collection\Behaviours\Uniqueable;

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
    use CanApplyCallback;
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
