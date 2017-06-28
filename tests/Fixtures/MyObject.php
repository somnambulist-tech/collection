<?php

namespace Somnambulist\Tests\Collection\Fixtures;

/**
 * Class MyObject
 *
 * @package    Somnambulist\Tests\Collection\Fixtures
 * @subpackage Somnambulist\Tests\Collection\Fixtures\MyObject
 */
class MyObject
{

    public $foo;

    public $bar;

    protected $baz;

    protected $example;

    /**
     * Constructor.
     *
     * @param $foo
     * @param $bar
     * @param $baz
     * @param $example
     */
    public function __construct($foo, $bar, $baz, $example)
    {
        $this->foo     = $foo;
        $this->bar     = $bar;
        $this->baz     = $baz;
        $this->example = $example;
    }

    /**
     * @return mixed
     */
    public function getBaz()
    {
        return $this->baz;
    }

    /**
     * @return mixed
     */
    public function example()
    {
        return $this->example;
    }
}
