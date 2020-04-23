<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

use function array_search;
use function is_array;
use function reset;

/**
 * Trait First
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Query\First
 *
 * @property array $items
 */
trait First
{

    /**
     * Returns the first element from the collection; or null if empty
     *
     * @return mixed|null
     */
    public function first()
    {
        $value = reset($this->items) ?: null;

        if (self::isArrayWrappingEnabled() && is_array($value)) {
            $value = $this->items[array_search($value, $this->items)] = $this->new($value);
        }

        return $value;
    }
}
