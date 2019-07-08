<?php

namespace Somnambulist\Collection\Tests\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class CollectionArrayTest
 *
 * @package    Somnambulist\Collection\Tests\Collection
 * @subpackage Somnambulist\Collection\Tests\Collection\CollectionArrayTest
 */
class CollectionArrayTest extends TestCase
{

    /**
     * @group array
     */
    public function testCount()
    {
        $col = new Collection(new TestClass4());
        $col->bar = 'too';

        $this->assertCount(2, $col);
        $this->assertEquals(2, $col->count());
    }

    /**
     * @group array
     */
    public function testOffsetExists()
    {
        $col = new Collection(new TestClass4());
        $col->bar = 'too';

        $this->assertTrue(isset($col['bar']));
        $this->assertFalse(isset($col['dog']));
    }

    /**
     * @group array
     */
    public function testOffsetGetSet()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertEquals('too', $col['bar']);
    }

    /**
     * @group array
     */
    public function testOffsetGetArrayWillReturnCOllection()
    {
        $col = new Collection(['bar' => ['foo' => 'bar', 'baz' => 'lurman']]);

        $bar = $col['bar'];

        $this->assertInstanceOf(Collection::class, $bar);
        $this->assertCount(2, $bar);
    }

    /**
     * @group array
     */
    public function testOffsetUnset()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';
        unset($col['bar']);

        $this->assertObjectNotHasAttribute('bar', $col);
    }

    /**
     * @group array
     */
    public function testIterator()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        foreach ($col as $key => $value) {

        }

        $this->assertTrue(true);
    }

    /**
     * @group array
     */
    public function testGetIterator()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertInstanceOf(\ArrayIterator::class, $col->getIterator());
    }

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
}
