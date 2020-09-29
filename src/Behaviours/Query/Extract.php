<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Utils\KeyWalker;

/**
 * Trait Extract
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\Extract
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
