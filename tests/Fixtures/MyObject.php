<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Fixtures;

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

    public function customTitle()
    {
        return sprintf('%s - %s :: %s = %s', $this->foo, $this->bar, $this->baz, $this->example);
    }
}
