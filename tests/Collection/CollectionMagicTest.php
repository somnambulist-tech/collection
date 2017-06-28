<?php

namespace Somnambulist\Tests\Collection\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;
use Somnambulist\Tests\Collection\Fixtures\TestClass4;

/**
 * Class CollectionMagicTest
 *
 * @package    Somnambulist\Tests\Collection\Collection
 * @subpackage Somnambulist\Tests\Collection\Collection\CollectionMagicTest
 */
class CollectionMagicTest extends TestCase
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
        $col = new Collection(new TestClass4());

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
        $this->assertObjectNotHasAttribute('foo', $col);
    }

    /**
     * @group magic
     */
    public function testCallMethodDirectly()
    {
        $mock1 = $this->createMock(TestClass4::class);
        $mock1
            ->expects($this->once())
            ->method('asJson')
        ;

        $col = new Collection([
            'bar' => $mock1,
        ]);

        $col->asJson();
    }
}
