<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use Somnambulist\Components\Collection\Utils\Value;
use function array_replace;
use function array_replace_recursive;

/**
 * @property array $items
 */
trait ReplaceValues
{

    /**
     * @link https://www.php.net/array_replace
     *
     * @param array ...$items
     *
     * @return Collection|static
     */
    public function replace(array ...$items): Collection|static
    {
        Value::assertAllOfType($items, $this->type);

        $this->items = array_replace($this->items, ...$items);

        return $this;
    }

    /**
     * @link https://www.php.net/array_replace_recursive
     *
     * @param array ...$items
     *
     * @return Collection|static
     */
    public function replaceRecursively(array ...$items): Collection|static
    {
        Value::assertAllOfType($items, $this->type);

        $this->items = array_replace_recursive($this->items, ...$items);

        return $this;
    }
}
