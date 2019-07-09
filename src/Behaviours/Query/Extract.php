<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use Somnambulist\Collection\Utils\KeyWalker;

/**
 * Trait Extract
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\Extract
 *
 * @property array $items
 */
trait Extract
{

    /**
     * Extract the values for all items with an element named $element, optionally indexed by $withKey
     *
     * @param string      $element
     * @param string|null $withKey
     *
     * @return static
     */
    public function extract($element, $withKey = null)
    {
        return $this->new(KeyWalker::extract($this, $element, $withKey));
    }
}
