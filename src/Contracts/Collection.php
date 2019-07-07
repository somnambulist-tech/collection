<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

use ArrayAccess;
use Countable;
use IteratorAggregate;

/**
 * Interface Collection
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Collection
 */
interface Collection extends ArrayAccess, IteratorAggregate, Countable, Arrayable, Jsonable
{

}
