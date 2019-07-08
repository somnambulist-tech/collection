<?php

declare(strict_types=1);

namespace Somnambulist\Collection\Behaviours\Mutate;

use function array_replace;
use function array_replace_recursive;

/**
 * Trait CanReplace
 *
 * @package    Somnambulist\Collection\Behaviours
 * @subpackage Somnambulist\Collection\Behaviours\Mutate\CanReplace
 *
 * @property array $items
 */
trait CanReplace
{

    /**
     * @link https://www.php.net/array_replace
     *
     * @param array ...$items
     *
     * @return static
     */
    public function replace(...$items): self
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
    public function replaceRecursively(...$items): self
    {
        $this->items = array_replace_recursive($this->items, ...$items);

        return $this;
    }
}
