<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

use function array_key_exists;

/**
 * Class ObjectWithMagicProperties
 *
 * @package    Somnambulist\Components\Collection\Tests\Fixtures
 * @subpackage Somnambulist\Components\Collection\Tests\Fixtures\ObjectWithMagicProperties
 */
class ObjectWithMagicProperties
{

    private $attributes = [];

    /**
     * Constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }



    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * Note: if isset() is used with NULL values for keys, it returns false :'(
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return array_key_exists($name, $this->attributes);
    }


}
