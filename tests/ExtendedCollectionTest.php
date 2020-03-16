<?php declare(strict_types=1);

namespace Somnambulist\Collection\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\FrozenCollection;
use Somnambulist\Collection\MutableCollection;
use Somnambulist\Collection\Tests\Fixtures\MyCollection;
use Somnambulist\Collection\Tests\Fixtures\MyFrozenCollection;
use function strpos;

/**
 * Class ExtendedCollectionTest
 *
 * @package    Somnambulist\Collection\Tests
 * @subpackage Somnambulist\Collection\Tests\ExtendedCollectionTest
 */
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
