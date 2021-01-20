<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface Serializable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Serializable
 */
interface Serializable
{

    public function serialize(): string;

    public function unserialize(string $serialized): Collection|static;
}
