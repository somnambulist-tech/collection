<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\FrozenCollection;
use Somnambulist\Components\Collection\MutableCollection;
use Somnambulist\Components\Collection\Tests\Fixtures\MyCollection;
use Somnambulist\Components\Collection\Tests\Fixtures\MyFrozenCollection;
use function strpos;

class ExtendedCollectionTest extends TestCase
{
    public function testPreservesTypeOnNewCollectionMethods()
    {
        $col = new MutableCollection(['foo', 'bar', 'baz', 'baz', 'foobar']);
        $col->filter(function ($value) {
            return false !== strpos($value, 'foo');
        });

        $col2 = new MyCollection(['foo', 'bar', 'baz', 'baz', 'foobar']);
        $filtered = $col2->filter(function ($value) {
            return false !== strpos($value, 'foo');
        });

        $col3 = new FrozenCollection(['foo', 'bar', 'baz', 'baz', 'foobar']);

        $this->assertEquals(MutableCollection::class, $col->getCollectionClass());
        $this->assertEquals(MyCollection::class, $col2->getCollectionClass());
        $this->assertEquals(FrozenCollection::class, $col3->getCollectionClass());
        $this->assertInstanceOf(MyCollection::class, $filtered);
        $this->assertEquals(MyCollection::class, $filtered->getCollectionClass());
    }

    public function testPreservesTypeOnFrozenCollection()
    {
        $col = new MutableCollection(['foo', 'bar', 'baz', 'baz', 'foobar']);
        $col->setFreezableClass(MyFrozenCollection::class);
        $frozen = $col->freeze();

        $col2 = new MyCollection(['foo', 'bar', 'baz', 'baz', 'foobar']);

        $this->assertEquals(MyFrozenCollection::class, $col->getFreezableClass());
        $this->assertEquals(FrozenCollection::class, $col2->getFreezableClass());
        $this->assertInstanceOf(MyFrozenCollection::class, $frozen);
    }
}
