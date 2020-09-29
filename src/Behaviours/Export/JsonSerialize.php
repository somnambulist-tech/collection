<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Export;

/**
 * Trait JsonSerialize
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Export\JsonSerialize
 *
 * @property array $items
 */
trait JsonSerialize
{

    /**
     * Returns the collection in a form suitable for encoding to JSON
     *
     * @return array
     */
    public function JsonSerialize()
    {
        return $this->toArray();
    }
}
