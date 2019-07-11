<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_pop;

/**
 * Trait Pop
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\Pop
 *
 * @property array $items
 */
trait Pop
{

    /**
     * Pops the element off the end of the Collection
     *
     * @link https://www.php.net/array_pop
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->items);
    }
}
