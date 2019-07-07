<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Mappable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Mappable
 */
interface Mappable
{

    public function flatMap(callable $callable): self;

    public function map(callable $callable): self;

    public function mapInto(string $class): self;
}
