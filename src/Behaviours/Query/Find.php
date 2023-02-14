<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

/**
 * @property array $items
 */
trait Find
{

    /**
     * Finds the first item matching the criteria, false if not found
     *
     * @param callable|mixed $criteria A callable or an element to match
     *
     * @return mixed
     */
    public function find(string|callable $criteria): mixed
    {
        if (!is_callable($criteria)) {
            $criteria = fn ($value, $key) => $value === $criteria;
        }

        return $this->filter($criteria)->first() ?? false;
    }

    /**
     * Finds the last item matching the criteria, false if not found
     *
     * @param callable|mixed $criteria A callable or an element to match
     *
     * @return mixed
     */
    public function findLast(string|callable $criteria): mixed
    {
        return $this->filter($criteria)->last() ?? false;
    }
}
