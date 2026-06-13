<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class PopTest extends TestCase
{

    #[Group("array")]
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

    #[Group("array")]
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
