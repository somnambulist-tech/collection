<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\Exceptions\InvalidItemTypeException;
use Somnambulist\Components\Collection\FrozenCollection;
use Somnambulist\Components\Collection\MutableCollection;
use Somnambulist\Components\Collection\Tests\Fixtures\MyCollection;
use Somnambulist\Components\Collection\Tests\Fixtures\MyFrozenCollection;
use Somnambulist\Components\Collection\Tests\Fixtures\MyObject;
use Somnambulist\Components\Collection\Tests\Fixtures\MyObject2;
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

    public function testCanSetTypeOfValues()
    {
        $col = new class extends MutableCollection {
            protected ?string $type = MyObject::class;
        };

        $col->add(new MyObject('foo', 'bar', 'baz', 'example'));

        $this->assertCount(1, $col);
    }

    public function testTypedCollectionsWillFallbackToUntypedCollections()
    {
        $col = new class extends MutableCollection {
            protected ?string $type = MyObject::class;
        };

        $col->add(new MyObject('foo', 'bar', 'baz', 'example'));

        $this->assertCount(1, $col);

        $this->assertInstanceOf(MutableCollection::class, $col->map(fn ($o) => $o->foo));
    }

    #[DataProvider('methodsThatShouldFailByType')]
    public function testWhenTypeSetRejectsValues(string $method, mixed $value)
    {
        $col = new class extends MutableCollection {
            protected ?string $type = MyObject::class;
        };

        $this->expectException(InvalidItemTypeException::class);

        match ($method) {
            'fill' => $col->fill(1, 3, $value),
            'pad' => $col->pad(1, $value),
            'set' => $col->set(1, $value),
            default => $col->$method($value),
        };
    }

    public static function methodsThatShouldFailByType(): array
    {
        $obj = new MyObject2('foo', 'example');

        return [
            ['add', $obj],
            ['append', $obj],
            ['combine', $obj],
            ['concat', [$obj]],
            ['fill', $obj],
            ['fillKeysWith', $obj],
            ['merge', $obj],
            ['pad', $obj],
            ['prepend', $obj],
            ['push', $obj],
            ['replace', [$obj]],
            ['set', $obj],
            ['union', $obj],
        ];
    }
}
