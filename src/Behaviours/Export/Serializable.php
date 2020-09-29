<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Behaviours\Export;

use function array_key_exists;
use function is_array;
use function serialize;
use function unserialize;

/**
 * Trait Serializable
 *
 * @package    Somnambulist\Components\Collection\Behaviours
 * @subpackage Somnambulist\Components\Collection\Behaviours\Export\Serializable
 *
 * @property array $items
 */
trait Serializable
{

    /**
     * @link https://www.php.net/serialize
     *
     * @return string
     */
    public function serialize(): string
    {
        return serialize(['items' => $this->items]);
    }

    /**
     * @link https://www.php.net/unserialize
     *
     * @param string $serialized
     *
     * @return void
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        if (is_array($data) && array_key_exists('items', $data)) {
            $this->items = $data['items'];
        }
    }
}
