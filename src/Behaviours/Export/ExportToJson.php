<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Export;

use function json_encode;

/**
 * Trait ExportToJson
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Export\ExportToJson
 *
 * @property array $items
 */
trait ExportToJson
{

    /**
     * Return the collection as a JSON string, uses toArray to convert to an Array
     *
     * @param int $options Any JSON_* constants
     *
     * @return string
     */
    public function toJson(int $options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }
}
