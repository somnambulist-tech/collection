<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

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
