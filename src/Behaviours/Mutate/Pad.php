<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Mutate;

use Somnambulist\Components\Collection\Contracts\Collection;
use function array_pad;

/**
 * Trait Pad
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Mutate\Pad
 *
 * @property array $items
 */
trait Pad
{

    /**
     * Pads the Collection to size using value as the value of the new elements
     *
     * @link https://www.php.net/array_pad
     *
     * @param integer $size
     * @param mixed   $value
     *
     * @return Collection|static
     */
    public function pad(int $size, mixed $value): Collection|static
    {
        $this->items = array_pad($this->items, $size, $value);

        return $this;
    }
}
