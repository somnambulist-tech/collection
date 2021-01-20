<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Strings;

use Somnambulist\Components\Collection\Contracts\Collection;
use function mb_strtoupper;
use function strtoupper;

/**
 * Trait Upper
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Strings\upper
 *
 * @property array $items
 */
trait Upper
{

    /**
     * Returns a new collection will all values mapped to UPPER case
     *
     * @return Collection|static
     */
    public function upper(): Collection|static
    {
        return $this->map(fn ($item) => function_exists('mb_strtoupper') ? mb_strtoupper($item) : strtoupper($item));
    }
}
