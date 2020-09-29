<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface Freezable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Freezable
 */
interface Freezable
{

    /**
     * @return Immutable
     */
    public function freeze(): Immutable;
}
