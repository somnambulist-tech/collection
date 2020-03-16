<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use InvalidArgumentException;
use Somnambulist\Collection\Contracts\Immutable;
use Somnambulist\Collection\FrozenCollection;
use Somnambulist\Collection\Utils\ClassUtils;
use function is_null;

/**
 * Trait Freeze
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Freeze
 *
 * @property array $items
 */
trait Freeze
{

    /**
     * The class to use when "freezing" the collection
     *
     * Must implement the ImmutableCollection interface. When implementing an immutable
     * class, be careful that you avoid introducing mutation methods; sorting should be
     * counted in those, but the choice is up to you. You could sort and return a new
     * frozen collection via a custom implementation.
     *
     * @var string
     */
    protected $freezableClass = FrozenCollection::class;

    public function getFreezableClass(): string
    {
        if (is_null($this->freezableClass)) {
            $this->freezableClass = FrozenCollection::class;
        }

        return $this->freezableClass;
    }

    public function setFreezableClass(string $class): void
    {
        ClassUtils::assertClassImplements($class, Immutable::class);

        $this->freezableClass = $class;
    }

    public function freeze(): Immutable
    {
        $class = $this->getFreezableClass();

        return new $class($this->items);
    }
}
