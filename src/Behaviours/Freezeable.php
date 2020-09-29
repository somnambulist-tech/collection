<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours;

use Somnambulist\Components\Collection\Contracts\Immutable;
use Somnambulist\Components\Collection\FrozenCollection;
use Somnambulist\Components\Collection\Utils\ClassUtils;

/**
 * Trait Freezeable
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Freezeable
 *
 * @property array $items
 */
trait Freezeable
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
    protected string $freezableClass = FrozenCollection::class;

    public function getFreezableClass(): string
    {
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
