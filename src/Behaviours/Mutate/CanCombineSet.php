<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Collection\Utils\Value;
use function array_combine;

/**
 * Trait CanCombineSet
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanCombineSet
 *
 * @property array $items
 */
trait CanCombineSet
{

    /**
     * Create a collection by using this collection for keys and another for its values
     *
     * @param mixed $values
     *
     * @return static
     */
    public function combine($values): self
    {
        $values = Value::toArray($values);
        $unique = array_unique($values);

        if (count($values) !== count($unique)) {
            throw DuplicateItemException::preparedValuesContainDuplicates(__FUNCTION__);
        }

        return new static(array_combine($this->items, $values));
    }
}
