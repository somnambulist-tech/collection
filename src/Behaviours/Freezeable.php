<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use RuntimeException;
use Somnambulist\Collection\Contracts\ImmutableCollection;
use Somnambulist\Collection\FrozenCollection;
use function class_implements;
use function sprintf;

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

        if (!in_array(ImmutableCollection::class, class_implements($class))) {
            throw new RuntimeException(sprintf('%s does not implement %s', $this->freezableClass, ImmutableCollection::class));
        }

        return new $class($this->items);
    }
}
