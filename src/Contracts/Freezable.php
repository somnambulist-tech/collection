<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Freezable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Freezable
 */
interface Freezable
{

    /**
     * @return Immutable
     */
    public function freeze(): Immutable;
}
