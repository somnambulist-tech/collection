<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function implode;
use function sprintf;

/**
 * Trait ExportableToString
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\ExportableToString
 */
trait ExportableToString
{

    /**
     * Implodes all the values into a single string, objects should support __toString
     *
     * If withKeys is not null, the keys are output first using this to delineate them
     * from the value.
     *
     * @param null|string $glue
     * @param null|string $withKeys
     *
     * @return string
     */
    public function implode($glue = ',', $withKeys = null): string
    {
        $elements = [];

        foreach ($this->items as $key => $value) {
            if (null !== $withKeys) {
                $elements[] = sprintf('%s%s%s', $key, $withKeys, $value);
            } else {
                $elements[] = (string)$value;
            }
        }

        return implode($glue, $elements);
    }

    /**
     * Converts the collection to a JSON string
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->toJson();
    }
}
