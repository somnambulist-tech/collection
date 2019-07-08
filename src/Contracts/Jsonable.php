<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface Jsonable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\Jsonable
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
