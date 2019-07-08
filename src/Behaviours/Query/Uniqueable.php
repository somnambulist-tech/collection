<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function array_unique;

/**
 * Trait Uniquable
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Uniquable
 *
 * @property array $items
 */
trait Uniqueable
{

    /**
     * Creates a new Collection containing only unique values
     *
     * @link https://www.php.net/array_unique
     *
     * @param integer $type Sort flags to use on values, default SORT_STRING
     *
     * @return static
     */
    public function unique($type = SORT_STRING)
    {
        return $this->new(array_unique($this->items, $type));
    }
}
