<?php

namespace Somnambulist\Collection\Tests\Behaviours\Pipes;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass3;

/**
 * Class RunnableTests
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Pipes
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Pipes\RunnableTests
 */
class RunnableTests extends TestCase
{

    /**
     * @group collection
     */
    public function testCallAndCollect()
    {
        $col = new Collection([
            'bar' => new TestClass3(), 'bob' => new TestClass3(),
        ]);

        $ret = $col->map(function ($v, $k) {
            /** @var TestClass3 $v */
            return $v->toJson();
        });

        $expected = new Collection([
            'bar' => '{"foo":"bar"}',
            'bob' => '{"foo":"bar"}',
        ]);

        $this->assertEquals($expected, $ret);
    }

    /**
     * @group collection
     */
    public function testEach()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);
        $result = [];

        $col->each(function ($item, $key) use (&$result) {
            if ($item < 3) {
                $result[$key] = $item;
            }
        });

        $this->assertCount(2, $result);
        $this->assertEquals(['foo' => 1, 'baz' => 2], $result);
    }

}
