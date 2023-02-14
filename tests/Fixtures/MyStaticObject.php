<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

class MyStaticObject
{

    public $foo;
    public $bar;

    /**
     * Constructor.
     *
     * @param $foo
     * @param $bar
     */
    public function __construct($foo, $bar)
    {
        $this->foo = $foo;
        $this->bar = $bar;
    }

    public static function make($args)
    {
        return new self($args[0], $args[1]);
    }
}
