<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Contracts;

/**
 * Interface Jsonable
 *
 * @package    Somnambulist\Components\Collection\Contracts
 * @subpackage Somnambulist\Components\Collection\Contracts\Jsonable
 */
interface Jsonable
{

    public function toJson(int $options = 0): string;
}
