<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use Somnambulist\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Collection\Utils\Value;
use function array_combine;

/**
 * Trait CombineOnlyUniqueValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CombineOnlyUniqueValues
 *
 * @property array $items
 */
trait CombineOnlyUniqueValues
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
        $values = Value::toArray($values);
        $unique = array_unique($values);

        if (count($values) !== count($unique)) {
            throw DuplicateItemException::preparedValuesContainDuplicates(__FUNCTION__);
        }

        return $this->new(array_combine($this->items, $values));
    }
}
