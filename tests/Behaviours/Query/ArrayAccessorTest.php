<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

class ArrayAccessorTest extends TestCase
{

    #[Group("array")]
    public function testOffsetExists()
    {
        $col = new Collection(new TestClass4());
        $col->bar = 'too';

        $this->assertTrue(isset($col['bar']));
        $this->assertFalse(isset($col['dog']));
    }

    #[Group("array")]
    public function testOffsetGetSet()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertEquals('too', $col['bar']);
    }

    #[Group("array")]
    public function testOffsetGetArrayWillReturnCollection()
    {
        $col = new Collection(['bar' => ['foo' => 'bar', 'baz' => 'lurman']]);

        $bar = $col['bar'];

        $this->assertInstanceOf(Collection::class, $bar);
        $this->assertCount(2, $bar);
    }


    #[Group("array")]
    public function testOffsetGetReturnsArrayWhenConversionDisabled()
    {
        Collection::disableArrayWrapping();

        $col = new Collection(['bar' => ['foo' => 'bar', 'baz' => 'lurman']]);

        $bar = $col['bar'];

        $this->assertIsArray($bar);

        Collection::enableArrayWrapping();
    }

    #[Group("array")]
    public function testOffsetUnset()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';
        unset($col['bar']);

        $this->assertObjectNotHasProperty('bar', $col);
    }
}
