<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Query;

trait RandomValue
{

    /**
     * Shuffles the collection and picks the first element from it
     *
     * @return mixed
     */
    public function random(): mixed
    {
        return $this->shuffle()->first();
    }
}
