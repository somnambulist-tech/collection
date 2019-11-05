<?php declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Query;

/**
 * Trait RandomValue
 *
 * @package Somnambulist\Collection\Behaviours\Query
 * @subpackage Somnambulist\Collection\Behaviours\Query\RandomValue
 */
trait RandomValue
{

    /**
     * Shuffles the collection and picks the first element from it
     *
     * @return mixed
     */
    public function random()
    {
        return $this->shuffle()->first();
    }
}
