<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/*
 * BC with v2.0
 * @deprecated Exportable will be removed in the next major version
 */
class_alias(Arrayable::class, 'Somnambulist\Collection\Interfaces\ExportableInterface');

/**
 * Interface Arrayable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Arrayable
 */
interface Arrayable
{

    /**
     * @return array
     */
    public function toArray(): array;
}
