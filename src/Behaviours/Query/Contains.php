<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use function in_array;

/**
 * Trait Contains
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\Contains
 *
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
    public function contains($value): bool
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
    public function doesNotInclude($value): bool
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
    public function includes($value): bool
    {
        return $this->contains($value);
    }
}
