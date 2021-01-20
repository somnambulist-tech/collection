<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Strings;

use Somnambulist\Components\Collection\Contracts\Collection;

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
     * @return Collection|static
     */
    public function trim(): Collection|static
    {
        return $this->map('trim');
    }
}
