<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_fill;
use function array_fill_keys;

/**
 * Trait Fill
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\Fill
 *
 * @property array $items
 */
trait Fill
{

    /**
     * Fill an array with values beginning at index defined by start for count members
     *
     * Start can be a negative number. Count can be zero or more.
     *
     * @link https://www.php.net/array_fill
     *
     * @param int   $start
     * @param int   $count
     * @param mixed $value
     *
     * @return Collection|static
     */
    public function fill(int $start, int $count, mixed $value): Collection|static
    {
        return $this->new(array_fill($start, $count, $value));
    }

    /**
     * For all values in the current Collection, use as a key and assign $value to them
     *
     * This should only be used with scalar values that can be used as array keys.
     * A new Collection is returned with all previous values as keys, assigned the value.
     *
     * @link https://www.php.net/array_fill_keys
     *
     * @param mixed $value
     *
     * @return Collection|static
     */
    public function fillKeysWith(mixed $value): Collection|static
    {
        return $this->new(array_fill_keys($this->values()->toArray(), $value));
    }
}
