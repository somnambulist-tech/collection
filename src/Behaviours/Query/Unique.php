<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_unique;

/**
 * Trait Unique
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Unique
 *
 * @property array $items
 */
trait Unique
{

    /**
     * Creates a new Collection containing only unique values
     *
     * @link https://www.php.net/array_unique
     *
     * @param integer $type Sort flags to use on values, default SORT_STRING
     *
     * @return Collection|static
     */
    public function unique(int $type = SORT_STRING): Collection|static
    {
        return $this->new(array_unique($this->items, $type));
    }
}
