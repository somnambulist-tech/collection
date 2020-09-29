<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

use function array_unique;

/**
 * Trait Unique
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Unique
 *
 * @property array $items
 */
trait Unique
{

    /**
     * Creates a new Collection containing only unique values
     *
     * @link https://www.php.net/array_unique
     *
     * @param integer $type Sort flags to use on values, default SORT_STRING
     *
     * @return static
     */
    public function unique($type = SORT_STRING)
    {
        return $this->new(array_unique($this->items, $type));
    }
}
