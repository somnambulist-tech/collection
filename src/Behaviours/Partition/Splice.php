<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Partition;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_splice;
use function func_num_args;

/**
 * @property array $items
 */
trait Splice
{

    /**
     * Splice a portion of the underlying collection
     *
     * @link https://www.php.net/array_splice
     *
     * @param int      $offset
     * @param int|null $length
     * @param mixed    $replacement
     *
     * @return Collection|static
     */
    public function splice(int $offset, ?int $length = null, mixed $replacement = []): Collection|static
    {
        if (func_num_args() === 1) {
            return $this->new(array_splice($this->items, $offset));
        }

        return $this->new(array_splice($this->items, $offset, $length, $replacement));
    }
}
