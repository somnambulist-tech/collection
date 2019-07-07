<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Contracts\ImmutableCollection;
use Somnambulist\Collection\FrozenCollection;
use Somnambulist\Collection\Utils\ClassUtils;

/**
 * Trait Freezeable
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Freezeable
 *
 * @property array $items
 */
trait Freezeable
{

    /**
     * The class name to use when freezing the Collection
     *
     * Should implement the ImmutableCollection interface.
     *
     * @var string
     */
    public $freezableClass = FrozenCollection::class;

    public function freeze(): ImmutableCollection
    {
        $class = $this->freezableClass;

        ClassUtils::assertClassImplements($class, ImmutableCollection::class);

        return new $class($this->items);
    }
}
