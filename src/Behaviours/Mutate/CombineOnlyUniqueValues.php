<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\Utils\Value;
use function array_combine;

/**
 * Trait CombineOnlyUniqueValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\CombineOnlyUniqueValues
 *
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
     * @return static
     */
    public function combine($items)
    {
        $items  = Value::toArray($items);
        $unique = array_unique($items);

        if (count($items) !== count($unique)) {
            throw DuplicateItemException::preparedValuesContainDuplicates(__FUNCTION__);
        }

        return $this->new(array_combine($this->items, $items));
    }
}
