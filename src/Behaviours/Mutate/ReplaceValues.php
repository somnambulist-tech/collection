<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_replace;
use function array_replace_recursive;

/**
 * Trait ReplaceValues
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\ReplaceValues
 *
 * @property array $items
 */
trait ReplaceValues
{

    /**
     * @link https://www.php.net/array_replace
     *
     * @param array ...$items
     *
     * @return static
     */
    public function replace(...$items)
    {
        $this->items = array_replace($this->items, ...$items);

        return $this;
    }

    /**
     * @link https://www.php.net/array_replace_recursive
     *
     * @param array ...$items
     *
     * @return static
     */
    public function replaceRecursively(...$items)
    {
        $this->items = array_replace_recursive($this->items, ...$items);

        return $this;
    }
}
