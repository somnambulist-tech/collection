<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use function array_flip;

/**
 * Trait Flip
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\Flip
 *
 * @property array $items
 */
trait Flip
{

    /**
     * Exchange all values for keys and return new Collection
     *
     * Note: this should only be used with elements that can be used as valid PHP array keys.
     *
     * @link https://www.php.net/array_flip
     *
     * @return static
     */
    public function flip()
    {
        return $this->new(array_flip($this->items));
    }
}
