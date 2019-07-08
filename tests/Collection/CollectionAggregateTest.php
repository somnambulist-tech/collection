<?php

namespace Somnambulist\Collection\Tests\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class CollectionAggregateTest
 *
 * @package    Somnambulist\Collection\Tests\Collection
 * @subpackage Somnambulist\Collection\Tests\Collection\CollectionAggregateTest
 */
class CollectionAggregateTest extends TestCase
{

    /**
     * @group aggregate
     */
    public function testMin()
    {
        $col = new Collection([
            6, 9, 1, 4, 32, 8,
        ]);

        $this->assertEquals(1, $col->min());
    }

    /**
     * @group aggregate
     */
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

    /**
     * @group aggregate
     */
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

    /**
     * @group aggregate
     */
    public function testMax()
    {
        $col = new Collection([
            6, 9, 1, 4, 32, 8,
        ]);

        $this->assertEquals(32, $col->max());
    }

    /**
     * @group aggregate
     */
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

    /**
     * @group aggregate
     */
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

    /**
     * @group aggregate
     */
    public function testSum()
    {
        $col = new Collection([1, 2, 3, 4, 5]);

        $this->assertEquals(15, $col->sum());
    }

    /**
     * @group aggregate
     */
    public function testSumByKey()
    {
        $col = new Collection([['val' => 1], ['bar' => 2], ['bar' => 3], ['bar' => 4], ['val' => 5]]);

        $this->assertEquals(6, $col->sum('val'));
    }

    /**
     * @group aggregate
     */
    public function testSumByCallable()
    {
        $col = new Collection([['val' => 1], ['bar' => 2], ['bar' => 3], ['bar' => 4], ['val' => 5]]);

        $this->assertEquals(18, $col->sum(function ($item) {
            return isset($item['bar']) ? $item['bar'] * 2 : 0;
        }));
    }
}
