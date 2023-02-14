<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use function in_array;

/**
 * @property array $items
 */
trait Contains
{

    /**
     * Returns true if value is in the collection
     *
     * @link https://www.php.net/in_array
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function contains(mixed $value): bool
    {
        return in_array($value, $this->items, true);
    }

    public function doesNotContain($value): bool
    {
        return !$this->contains($value);
    }

    /**
     * Alias of doesNotContain
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function doesNotInclude(mixed $value): bool
    {
        return $this->doesNotContain($value);
    }

    /**
     * Alias of contains
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function includes(mixed $value): bool
    {
        return $this->contains($value);
    }
}
