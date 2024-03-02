<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

class MagicMethodTest extends TestCase
{
    /**
     * @group magic
     */
    public function testCanRestoreState()
    {
        $col  = new Collection(new TestClass4());
        $test = var_export($col, true);

        /** @var Collection $col2 */
        eval('$col2 = ' . $test . ';');

        $this->assertInstanceOf(Collection::class, $col2);
        $this->assertCount(1, $col2);
    }

    /**
     * @group magic
     */
    public function testMagicIsset()
    {
        $col = new Collection(['foo' => new TestClass4(), 'baz' => new TestClass4()]);

        $this->assertTrue(isset($col->foo));
        $this->assertFalse(isset($col->bar));
    }

    /**
     * @group magic
     */
    public function testMagicSetGet()
    {
        $col = new Collection();
        $col->foo = 'bar';

        $this->assertEquals('bar', $col->foo);
    }

    /**
     * @group magic
     */
    public function testMagicUnset()
    {
        $col = new Collection();
        $col->foo = 'bar';

        $this->assertEquals('bar', $col->foo);
        unset($col->foo);
        $this->assertObjectNotHasProperty('foo', $col);
    }
}
