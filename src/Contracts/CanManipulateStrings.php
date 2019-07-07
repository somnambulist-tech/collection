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

    public function capitalize(): self;

    public function lower(): self;

    public function trim(): self;

    public function upper(): self;
}
