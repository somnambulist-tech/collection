<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Utils\Value;
use function array_combine;

/**
 * Trait CanCombine
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanCombine
 *
 * @property array $items
 */
trait CanCombine
{

    /**
     * Create a collection by using this collection for keys and another for its values
     *
     * @param mixed $values
     *
     * @return static
     */
    public function combine($values): self
    {
        return new static(array_combine($this->items, Value::toArray($values)));
    }
}
