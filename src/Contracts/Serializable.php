<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Serializable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Serializable
 */
interface Serializable
{

    public function serialize(): string;

    /**
     * @param string $serialized
     *
     * @return static
     */
    public function unserialize($serialized);
}
