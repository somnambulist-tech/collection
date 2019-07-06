<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_shift;

/**
 * Trait CanShift
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanShift
 */
trait CanShift
{

    /**
     * Remove the first value from the collection
     *
     * @link https://www.php.net/array_shift
     *
     * @return static
     */
    public function shift(): self
    {
        return array_shift($this->items);
    }
}
