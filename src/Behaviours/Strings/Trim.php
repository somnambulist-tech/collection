<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Strings;

/**
 * Trait Trim
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Strings\Trim
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
        return $this->map('trim');
    }
}
