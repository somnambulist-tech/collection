<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Strings;

use function mb_strtolower;
use function strtolower;

/**
 * Trait Lower
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Strings\Lower
 *
 * @property array $items
 */
trait Lower
{

    /**
     * Returns a new collection will all values mapped to lower case
     *
     * @return static
     */
    public function lower()
    {
        return $this->map(fn ($item) => function_exists('mb_strtolower') ? mb_strtolower($item) : strtolower($item));
    }
}
