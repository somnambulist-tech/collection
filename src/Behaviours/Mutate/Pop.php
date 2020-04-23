<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_pop;
use function is_array;

/**
 * Trait Pop
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\Pop
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
    public function pop()
    {
        $value = array_pop($this->items);

        if (self::isArrayWrappingEnabled() && is_array($value)) {
            $value = $this->new($value);
        }

        return $value;
    }
}
