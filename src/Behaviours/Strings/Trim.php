<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Strings;

use function trim;

/**
 * Trait Trim
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Strings\Trim
 *
 * @property array $items
 */
trait Trim
{

    /**
     * Trims all values using trim(), returning a new Collection
     *
     * @return static
     */
    public function trim()
    {
        return $this->map(function ($item) {
            return trim($item);
        });
    }
}
