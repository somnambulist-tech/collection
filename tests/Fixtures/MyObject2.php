<?php

namespace Somnambulist\Components\Collection\Tests\Fixtures;

/**
 * Class MyObject2
 *
 * @package    Somnambulist\Components\Collection\Tests\Fixtures
 * @subpackage Somnambulist\Components\Collection\Tests\Fixtures\MyObject2
 */
class MyObject2
{

    public $foo;

    protected $example;

    /**
     * Constructor.
     *
     * @param $foo
     * @param $example
     */
    public function __construct($foo, $example)
    {
        $this->foo     = $foo;
        $this->example = $example;
    }

    /**
     * @return mixed
     */
    public function getFoo()
    {
        return $this->foo;
    }

    /**
     * @return mixed
     */
    public function example()
    {
        return $this->example;
    }
}
