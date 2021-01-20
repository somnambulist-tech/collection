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

    public function capitalize(): Collection|static;

    public function lower(): Collection|static;

    public function trim(): Collection|static;

    public function upper(): Collection|static;
}
