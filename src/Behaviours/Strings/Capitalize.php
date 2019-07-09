<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Strings;

use function mb_convert_case;
use function ucwords;

/**
 * Trait Capitalize
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Strings\Capitalize
 *
 * @property array $items
 */
trait Capitalize
{

    /**
     * Returns a new collection will all string values capitalized
     *
     * @return static
     */
    public function capitalize()
    {
        return $this->map(function ($item) {
            return (function_exists('mb_convert_case')) ? mb_convert_case($item, MB_CASE_TITLE) : ucwords($item);
        });
    }
}
