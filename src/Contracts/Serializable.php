<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

interface Serializable
{

    public function serialize(): string;

    public function unserialize(string $serialized): Collection|static;
}
