<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Strings;

use Somnambulist\Components\Collection\Contracts\Collection;
use function mb_convert_case;
use function ucwords;

/**
 * @property array $items
 */
trait Capitalize
{

    /**
     * Returns a new collection will all string values capitalized
     *
     * @return Collection|static
     */
    public function capitalize(): Collection|static
    {
        return $this->map(fn ($item) => function_exists('mb_convert_case') ? mb_convert_case($item, MB_CASE_TITLE) : ucwords($item));
    }
}
