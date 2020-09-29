<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class PopTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Query\PopTest
 */
class PopTest extends TestCase
{

    /**
     * @group array
     */
    public function testPop()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);

        $ret = $col->pop();

        $this->assertEquals(3, $ret);
        $this->assertCount(2, $col);
    }

    /**
     * @group array
     */
    public function testPopWillWrapArrays()
    {
        $col = new Collection([
            [
                'foo' => 1,
                'baz' => 2,
                'bob' => 3,
            ]
        ]);

        $ret = $col->pop();

        $this->assertInstanceOf(Collection::class, $ret);
        $this->assertCount(3, $ret);
        $this->assertCount(0, $col);
    }
}
