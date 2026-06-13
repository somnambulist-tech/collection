<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Aggregate;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

class AggregateValuesTest extends TestCase
{
    #[Group("aggregate")]
    public function testAverage()
    {
        $col = new Collection([
            6, 9, 1, 4, 32, 8,
        ]);

        $this->assertEquals((6+9+1+4+32+8)/6, $col->average());
    }

    #[Group("aggregate")]
    public function testAverageCanUseKey()
    {
        $col = new Collection([
            ['key' => 45,],
            ['key' => 3,],
            ['key' => 2,],
            ['key' => 56,],
            ['key' => 8,],
        ]);

        $this->assertEquals((45+3+2+56+8)/5, $col->average('key'));
    }

    #[Group("aggregate")]
    public function testMin()
    {
        $col = new Collection([
            6, 9, 1, 4, 32, 8,
        ]);

        $this->assertEquals(1, $col->min());
    }

    #[Group("aggregate")]
    public function testMinCanUseKey()
    {
        $col = new Collection([
            ['key' => 45,],
            ['key' => 3,],
            ['key' => 2,],
            ['key' => 56,],
            ['key' => 8,],
        ]);

        $this->assertEquals(2, $col->min('key'));
    }

    #[Group("aggregate")]
    public function testMinCanWorkWithSimpleArrays()
    {
        $col = new Collection([
            ['key' => 45,],
            ['key' => 3,],
            ['key' => 2,],
            ['key' => 56,],
            ['key' => 8,],
        ]);

        $this->assertEquals(['key' => 2], $col->min());
    }

    #[Group("aggregate")]
    public function testMax()
    {
        $col = new Collection([
            6, 9, 1, 4, 32, 8,
        ]);

        $this->assertEquals(32, $col->max());
    }

    #[Group("aggregate")]
    public function testMaxCanUseKey()
    {
        $col = new Collection([
            ['key' => 45,],
            ['key' => 3,],
            ['key' => 2,],
            ['key' => 56,],
            ['key' => 8,],
        ]);

        $this->assertEquals(56, $col->max('key'));
    }

    #[Group("aggregate")]
    public function testMaxCanWorkWithSimpleArrays()
    {
        $col = new Collection([
            ['key' => 45,],
            ['key' => 3,],
            ['key' => 2,],
            ['key' => 56,],
            ['key' => 8,],
        ]);

        $this->assertEquals(['key' => 56], $col->max());
    }

    #[Group("aggregate")]
    public function testModalCanWorkWithSimpleArrays()
    {
        $col = new Collection([
            2, 3, 3, 3, 5, 56, 6, 7, 45, 34, 3,
        ]);

        $this->assertEquals(3, $col->modal());
    }

    #[Group("aggregate")]
    public function testModalReturnsFalseIfNoModal()
    {
        $col = new Collection([
            ['key' => 45,],
            ['key' => 3,],
            ['key' => 2,],
            ['key' => 56,],
            ['key' => 8,],
        ]);

        $this->assertFalse($col->modal('key'));
    }

    #[Group("aggregate")]
    public function testModalCanReturnMultipleModals()
    {
        $col = new Collection([
            ['key' => 45,],
            ['key' => 2,],
            ['key' => 2,],
            ['key' => 45,],
            ['key' => 8,],
        ]);

        $this->assertEquals([45, 2], $col->modal('key'));
    }

    #[Group("aggregate")]
    public function testSum()
    {
        $col = new Collection([1, 2, 3, 4, 5]);

        $this->assertEquals(15, $col->sum());
    }

    #[Group("aggregate")]
    public function testSumByKey()
    {
        $col = new Collection([['val' => 1], ['bar' => 2], ['bar' => 3], ['bar' => 4], ['val' => 5]]);

        $this->assertEquals(6, $col->sum('val'));
    }

    #[Group("aggregate")]
    public function testSumByCallable()
    {
        $col = new Collection([['val' => 1], ['bar' => 2], ['bar' => 3], ['bar' => 4], ['val' => 5]]);

        $this->assertEquals(18, $col->sum(function ($item) {
            return isset($item['bar']) ? $item['bar'] * 2 : 0;
        }));
    }
}
