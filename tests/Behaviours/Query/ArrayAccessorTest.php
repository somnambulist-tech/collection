<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class ArrayAccessorTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\ArrayAccessorTest
 */
class ArrayAccessorTest extends TestCase
{

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
    public function testOffsetGetArrayWillReturnCollection()
    {
        $col = new Collection(['bar' => ['foo' => 'bar', 'baz' => 'lurman']]);

        $bar = $col['bar'];

        $this->assertInstanceOf(Collection::class, $bar);
        $this->assertCount(2, $bar);
    }


    /**
     * @group array
     */
    public function testOffsetGetReturnsArrayWhenConversionDisabled()
    {
        Collection::disableArrayWrapping();

        $col = new Collection(['bar' => ['foo' => 'bar', 'baz' => 'lurman']]);

        $bar = $col['bar'];

        $this->assertIsArray($bar);

        Collection::enableArrayWrapping();
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
}
