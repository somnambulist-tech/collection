<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use function array_unshift;

/**
 * Trait PrependOnlyUniqueValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\PrependOnlyUniqueValues
 *
 * @property array $items
 */
trait PrependOnlyUniqueValues
{

    /**
     * Prepends the elements to the beginning of the collection
     *
     * @link https://www.php.net/array_unshift
     *
     * @param mixed ...$value
     *
     * @return static
     */
    public function prepend(...$value)
    {
        foreach ($value as $item) {
            if ($this->contains($item)) {
                throw DuplicateItemException::found($value, $this->keys($item)->first());
            }

            array_unshift($this->items, $item);
        }

        return $this;
    }
}
