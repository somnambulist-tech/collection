<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

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
     * @param null|integer $type Sort flags to use on values
     *
     * @return static
     */
    public function unique($type = null): self
    {
        return new static(array_unique($this->items, $type));
    }
}
