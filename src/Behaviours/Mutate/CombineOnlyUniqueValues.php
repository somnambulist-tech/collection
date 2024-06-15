<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\Utils\Value;
use function array_combine;

/**
 * @property array $items
 */
trait CombineOnlyUniqueValues
{

    /**
     * Create a collection by using this collection for keys and another for its values
     *
     * @link https://www.php.net/array_combine
     *
     * @param mixed $items
     *
     * @return Collection|static
     */
    public function combine(mixed $items): Collection|static
    {
        $items  = Value::toArray($items);
        $unique = array_unique($items);

        Value::assertAllOfType($items, $this->type);

        if (count($items) !== count($unique)) {
            throw DuplicateItemException::preparedValuesContainDuplicates(__FUNCTION__);
        }

        return $this->new(array_combine($this->items, $items));
    }
}
