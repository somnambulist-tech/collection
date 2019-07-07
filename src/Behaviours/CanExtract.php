<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Utils\KeyWalker;

/**
 * Trait CanExtract
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanExtract
 *
 * @property array $items
 */
trait CanExtract
{

    /**
     * Extract the values for all items with an element named $element, optionally indexed by $withKey
     *
     * @param string      $element
     * @param string|null $withKey
     *
     * @return static
     */
    public function extract($element, $withKey = null): self
    {
        return new static(KeyWalker::extract($this, $element, $withKey));
    }
}
