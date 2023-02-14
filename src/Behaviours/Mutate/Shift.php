<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use function array_shift;
use function is_array;

/**
 * @property array $items
 */
trait Shift
{

    /**
     * Remove the first value from the collection
     *
     * @link https://www.php.net/array_shift
     *
     * @return mixed
     */
    public function shift(): mixed
    {
        $value = array_shift($this->items);

        if (self::isArrayWrappingEnabled() && is_array($value)) {
            $value = $this->new($value);
        }

        return $value;
    }
}
