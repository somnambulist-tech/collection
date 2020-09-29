<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface CanManipulateStrings
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\CanManipulateStrings
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
