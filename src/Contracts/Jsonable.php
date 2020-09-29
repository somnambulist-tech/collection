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

    /**
     * @param int $options Any valid combination of JSON_* constants
     *
     * @return string
     */
    public function toJson(int $options = 0): string;
}
