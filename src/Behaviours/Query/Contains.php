<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function in_array;
use function is_scalar;

/**
 * Trait Contains
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\Contains
 *
 * @property array $items
 */
trait Contains
{

    /**
     * Returns true if value is in the collection
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function contains($value): bool
    {
        return in_array($value, $this->items, true);
    }

    public function doesNotContain($value): bool
    {
        return !$this->contains($value);
    }

    /**
     * Alias of doesNotContain
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function doesNotInclude($value): bool
    {
        return $this->doesNotContain($value);
    }

    /**
     * Alias of contains
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function includes($value): bool
    {
        return $this->contains($value);
    }
}
