<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

/**
 * Trait Find
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\Find
 *
 * @property array $items
 */
trait Find
{

    /**
     * Finds the first item matching the criteria
     *
     * @param callable|mixed $criteria A callable or an element to match
     *
     * @return mixed
     */
    public function find($criteria)
    {
        if (!is_callable($criteria)) {
            $criteria = function ($value, $key) use ($criteria) {
                return $value === $criteria;
            };
        }

        return $this->filter($criteria)->first() ?? false;
    }

    /**
     * Finds the last item matching the criteria
     *
     * @param callable|mixed $criteria A callable or an element to match
     *
     * @return mixed
     */
    public function findLast($criteria)
    {
        return $this->filter($criteria)->last() ?? false;
    }
}
