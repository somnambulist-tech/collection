<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use function array_pop;
use function is_array;

/**
 * Trait Pop
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\Pop
 *
 * @property array $items
 */
trait Pop
{

    /**
     * Pops the element off the end of the Collection
     *
     * @link https://www.php.net/array_pop
     *
     * @return mixed
     */
    public function pop(): mixed
    {
        $value = array_pop($this->items);

        if (self::isArrayWrappingEnabled() && is_array($value)) {
            $value = $this->new($value);
        }

        return $value;
    }
}
