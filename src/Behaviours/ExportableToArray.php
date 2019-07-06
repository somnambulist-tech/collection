<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use Somnambulist\Collection\Contracts\Arrayable;

/**
 * Trait ExportableToArray
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\ExportableToArray
 */
trait ExportableToArray
{

    public function toArray(): array
    {
        $array = [];

        foreach ($this->items as $key => $value) {
            if ($value instanceof Arrayable) {
                $array[$key] = $value->toArray();
            } else {
                $array[$key] = $value;
            }
        }

        return $array;
    }
}
