<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\MapReduce;

use Somnambulist\Components\Collection\Utils\Value;

/**
 * Trait Collapse
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\MapReduce\Collapse
 *
 * @property array $items
 */
trait Collapse
{

    /**
     * Collapse the collection of items into a single array
     *
     * @return static
     */
    public function collapse()
    {
        return $this->new(Value::collapse($this->items));
    }
}
