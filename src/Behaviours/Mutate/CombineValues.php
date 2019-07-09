<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Utils\Value;
use function array_combine;

/**
 * Trait CombineValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CombineValues
 *
 * @property array $items
 */
trait CombineValues
{

    /**
     * Create a collection by using this collection for keys and another for its values
     *
     * @param mixed $values
     *
     * @return static
     */
    public function combine($values)
    {
        return $this->new(array_combine($this->items, Value::toArray($values)));
    }
}
