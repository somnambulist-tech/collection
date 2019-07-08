<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Partition;

use function array_splice;
use function func_num_args;

/**
 * Trait CanSplice
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Partition\CanSplice
 *
 * @property array $items
 */
trait CanSplice
{

    /**
     * Splice a portion of the underlying collection
     *
     * @param int      $offset
     * @param int|null $length
     * @param mixed    $replacement
     *
     * @return static
     */
    public function splice($offset, $length = null, $replacement = [])
    {
        if (func_num_args() === 1) {
            return $this->new(array_splice($this->items, $offset));
        }

        return $this->new(array_splice($this->items, $offset, $length, $replacement));
    }
}
