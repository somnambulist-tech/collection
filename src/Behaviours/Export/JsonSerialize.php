<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Export;

/**
 * @property array $items
 */
trait JsonSerialize
{

    /**
     * Returns the collection in a form suitable for encoding to JSON
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
