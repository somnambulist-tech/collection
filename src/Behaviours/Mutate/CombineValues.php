<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;
use function array_combine;

/**
 * Trait CombineValues
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\CombineValues
 *
 * @property array $items
 */
trait CombineValues
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
        return $this->new(array_combine($this->items, Value::toArray($items)));
    }
}
