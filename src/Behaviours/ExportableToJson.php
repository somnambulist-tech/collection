<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

/**
 * Trait ExportableToJson
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\ExportableToJson
 */
trait ExportableToJson
{

    public function toJson(int $options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }
}
