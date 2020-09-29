<?php

namespace Somnambulist\Components\Collection\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\Exceptions\CollectionIsFrozenException;
use Somnambulist\Components\Collection\FrozenCollection as Immutable;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

/**
 * Class ImmutableCollectionTest
 *
 * @package    Somnambulist\Components\Collection\Tests
 * @subpackage Somnambulist\Components\Collection\Tests\ImmutableCollectionTest
 * @group frozen-collection
 */
class ImmutableCollectionTest extends TestCase
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

        /** @var Immutable $col2 */
        eval('$col2 = ' . $test . ';');

        $this->assertInstanceOf(Immutable::class, $col2);
        $this->assertCount(1, $col2);
    }

    public function testCannotSetValueByArrayAccess()
    {
        $col = new Immutable();

        $this->expectException(CollectionIsFrozenException::class);
        $col['foo'] = 'bar';
    }

    public function testCannotSetValueByMagicSet()
    {
        $col = new Immutable();

        $this->expectException(CollectionIsFrozenException::class);
        $col->foo = 'bar';
    }

    public function testCannotUnsetByArrayAccess()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(CollectionIsFrozenException::class);
        unset($col['foo']);
    }

    public function testCannotUnsetByMagicUnset()
    {
        $col = new Immutable(['foo' => 'bar']);

        $this->expectException(CollectionIsFrozenException::class);
        unset($col->foo);
    }
}
