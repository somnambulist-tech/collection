<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours;

use function array_push;

/**
 * Trait CanAppend
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\CanAppend
 */
trait CanAppend
{

    /**
     * Add elements to the end of the collection
     *
     * @link https://www.php.net/array_push
     *
     * @param mixed ...$value One or values to add
     *
     * @return static
     */
    public function append(...$value): self
    {
        array_push($this->items, ...$value);

        return $this;
    }

    /**
     * Alias of append
     *
     * @param mixed ...$value
     *
     * @return static
     */
    public function push(...$value): self
    {
        return $this->append(...$value);
    }
}
