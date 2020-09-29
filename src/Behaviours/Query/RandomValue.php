<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

/**
 * Trait RandomValue
 *
 * @package Somnambulist\Components\Collection\Behaviours\Query
 * @subpackage Somnambulist\Components\Collection\Behaviours\Query\RandomValue
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
