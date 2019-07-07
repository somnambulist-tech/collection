<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Arrayable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Arrayable
 */
interface Arrayable
{

    /**
     * Return an array from the object
     *
     * @return array
     */
    public function toArray(): array;
}
