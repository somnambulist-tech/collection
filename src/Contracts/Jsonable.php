<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Contracts;

/**
 * Interface JsonSerializable
 *
 * @package    Somnambulist\Collection\Contracts
 * @subpackage Somnambulist\Collection\Contracts\JsonSerializable
 */
interface Jsonable
{

    /**
     * @param int $options Any valid combination of JSON_* constants
     *
     * @link https://www.php.net/json_encode
     *
     * @return string
     */
    public function toJson(int $options = 0): string;
}
