<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

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
