<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Strings;

use function mb_strtoupper;
use function strtoupper;

/**
 * Trait Upper
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Strings\upper
 *
 * @property array $items
 */
trait Upper
{

    /**
     * Returns a new collection will all values mapped to UPPER case
     *
     * @return static
     */
    public function upper()
    {
        return $this->map(fn ($item) => function_exists('mb_strtoupper') ? mb_strtoupper($item) : strtoupper($item));
    }
}
