<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_pop;

/**
 * Trait CanPop
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanPop
 *
 * @property array $items
 */
trait CanPop
{

    /**
     * Pops the element off the end of the Collection
     *
     * @link http://ca.php.net/array_pop
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->items);
    }
}
