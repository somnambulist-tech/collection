<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_shift;
use function is_array;

/**
 * Trait Shift
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\Shift
 *
 * @property array $items
 */
trait Shift
{

    /**
     * Remove the first value from the collection
     *
     * @link https://www.php.net/array_shift
     *
     * @return static
     */
    public function shift()
    {
        $value = array_shift($this->items);

        if (self::isArrayWrappingEnabled() && is_array($value)) {
            $value = $this->new($value);
        }

        return $value;
    }
}
