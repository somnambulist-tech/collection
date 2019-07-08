<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface CanManipulateStrings
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\CanManipulateStrings
 */
interface CanManipulateStrings
{

    /**
     * @return static
     */
    public function capitalize();

    /**
     * @return static
     */
    public function lower();

    /**
     * @return static
     */
    public function trim();

    /**
     * @return static
     */
    public function upper();
}
