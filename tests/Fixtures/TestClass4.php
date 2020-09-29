<?php

namespace Somnambulist\Components\Collection\Tests\Fixtures;

/**
 * Class TestClass4
 *
 * @package    Somnambulist\Components\Collection\Tests\Fixtures
 * @subpackage Somnambulist\Components\Collection\Tests\Fixtures\TestClass4
 */
class TestClass4
{
    public function asJson()
    {
        return '{"foo":"bar"}';
    }

    public static function __set_state($an_array)
    {
        return new static($an_array);
    }
}
