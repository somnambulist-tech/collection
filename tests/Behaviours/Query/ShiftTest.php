<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class ShiftTest extends TestCase
{

    /**
     * @group array
     */
    public function testShift()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);

        $ret = $col->shift();

        $this->assertEquals(1, $ret);
        $this->assertCount(2, $col);
    }

    /**
     * @group array
     */
    public function testShiftWilLWrapArrays()
    {
        $col = new Collection([
            [
                'foo' => 1,
                'baz' => 2,
                'bob' => 3,
            ],
        ]);

        $ret = $col->shift();

        $this->assertInstanceOf(Collection::class, $ret);
        $this->assertCount(3, $ret);
        $this->assertCount(0, $col);
    }
}
