<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

interface Freezable
{

    public function freeze(): Immutable;
}
