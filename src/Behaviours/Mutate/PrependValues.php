<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use function array_unshift;

/**
 * Trait PrependValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\PrependValues
 *
 * @property array $items
 */
trait PrependValues
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
        array_unshift($this->items, ...$value);

        return $this;
    }
}
