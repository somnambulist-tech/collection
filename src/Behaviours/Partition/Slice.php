<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Partition;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_slice;

/**
 * Trait Slice
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Partition\Slice
 *
 * @property array $items
 */
trait Slice
{

    /**
     * Extracts a portion of the Collection, returning a new Collection
     *
     * By default, preserves the keys.
     *
     * @link https://www.php.net/array_slice
     *
     * @param int      $offset
     * @param int|null $limit
     * @param bool     $keys
     *
     * @return Collection|static
     */
    public function slice(int $offset, int $limit = null, bool $keys = true): Collection|static
    {
        return $this->new(array_slice($this->items, $offset, $limit, $keys));
    }
}
