<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Strings;

use function mb_convert_case;
use function ucwords;

/**
 * Trait Capitalize
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Strings\Capitalize
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
        return $this->map(fn ($item) => function_exists('mb_convert_case') ? mb_convert_case($item, MB_CASE_TITLE) : ucwords($item));
    }
}
