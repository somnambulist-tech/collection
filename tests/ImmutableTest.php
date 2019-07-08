<?php

namespace Somnambulist\Collection\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\FrozenCollection as Immutable;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class ImmutableTest
 *
 * @package    Somnambulist\Collection\Tests
 * @subpackage Somnambulist\Collection\Tests\ImmutableTest
 */
class ImmutableTest extends TestCase
{

    public function testCollect()
    {
        $col = Immutable::collect(['foo' => 'bar']);

        $this->assertCount(1, $col);
    }

    public function testCanSerialize()
    {
        $col = new Immutable([new TestClass4(), 'bar' => 'foo']);

        $tmp = serialize($col);
        $col = unserialize($tmp);

        $this->assertInstanceOf(Immutable::class, $col);
        $this->assertCount(2, $col);
    }

    public function testCanRestoreState()
    {
        $col  = new Immutable(new TestClass4());
        $test = var_export($col, true);

        /** @var Collection $col2 */
        eval('$col2 = ' . $test . ';');

        $this->assertInstanceOf(Immutable::class, $col2);
        $this->assertCount(1, $col2);
    }

    public function testCannotSetValueByArrayAccess()
    {
        $col = new Immutable();

        $this->expectException(\RuntimeException::class);
        $col['foo'] = 'bar';
    }

    public function testCannotSetValueByMagicSet()
    {
        $col = new Immutable();

        $this->expectException(\RuntimeException::class);
        $col->foo = 'bar';
    }

    public function testCannotResetCollection()
    {
        $col = new Immutable();

        $this->expectException(\RuntimeException::class);
        $col->reset();
    }

    public function testCannotUnsetByArrayAccess()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        unset($col['foo']);
    }

    public function testCannotUnsetByMagicUnset()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        unset($col->foo);
    }

    public function testCallingFreezeReturnsSelf()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->assertSame($col, $col->freeze());
    }

    public function testCannotAppend()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->append(['bar' => 'baz']);
    }

    public function testCannotMerge()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->merge(['bar' => 'baz']);
    }

    public function testCannotPad()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->pad(10, 'bar');
    }

    public function testCannotPop()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->pop();
    }

    public function testCannotReverse()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->reverse();
    }

    public function testCannotShift()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->shift();
    }

    public function testCannotSortByKey()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortByKey();
    }

    public function testCannotSortByKeyReversed()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortByKeyReversed();
    }

    public function testCannotSortByValue()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortByValue();
    }

    public function testCannotSortByValueReversed()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortByValueReversed();
    }

    public function testCannotSortUsing()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortUsing(function () {});
    }

    public function testCannotSortKeepingKeysUsing()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->sortKeepingKeysUsing(function () {});
    }

    public function testCannotAdd()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->add('bar');
    }

    public function testCannotSet()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->set('bar', 'baz');
    }

    public function testCannotRemove()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(\RuntimeException::class);
        $col->remove('foo');
    }
}
