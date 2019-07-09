<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use InvalidArgumentException;
use Somnambulist\Collection\Contracts\Immutable;
use Somnambulist\Collection\FrozenCollection;
use Somnambulist\Collection\Utils\ClassUtils;

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
     * @var string
     */
    protected static $freezableClass = FrozenCollection::class;

    /**
     * Set the class to use when "freezing" the collection
     *
     * Must implement the ImmutableCollection interface. When implementing an immutable
     * class, be careful of adding mutation methods.
     *
     * @param string $class
     * @throws InvalidArgumentException
     */
    public static function setFreezableClass(string $class): void
    {
        ClassUtils::assertClassImplements($class, Immutable::class);

        self::$freezableClass = $class;
    }

    public function freeze(): Immutable
    {
        return new self::$freezableClass($this->items);
    }
}
