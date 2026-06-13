<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\MutableSet as Collection;
use function str_repeat;

#[Group("mutable-set")]
class MutableSetTest extends TestCase
{
    #[Group("collection")]
    public function testCanAddDifferentValues()
    {
        $col = new Collection();
        $col->add('value')->add('value2');

        $this->assertCount(2, $col);
    }

    #[Group("collection")]
    public function testAddDoesNotDuplicateValues()
    {
        $this->expectException(DuplicateItemException::class);

        $col = new Collection();
        $col->add('value')->add('value')->add('value');
    }

    #[Group("collection")]
    public function testAppendDoesNotDuplicateValues()
    {
        $this->expectException(DuplicateItemException::class);

        $col = new Collection();
        $col->append('value', 'value', 'value');
    }

    #[Group("collection")]
    public function testPrependDoesNotDuplicateValues()
    {
        $this->expectException(DuplicateItemException::class);

        $col = new Collection();
        $col->prepend('value', 'value', 'value');
    }

    #[Group("collection")]
    public function testDuplicateItemsOnCreateRaisesException()
    {
        $this->expectException(DuplicateItemException::class);

        new Collection(['value', 'value', 'value']);
    }

    #[Group("collection")]
    public function testMergingWithDuplicatesRaisesException()
    {
        $this->expectException(DuplicateItemException::class);

        (new Collection(['value1', 'value2', 'value3']))->merge(['value2', 'value3']);
    }

    #[Group("collection")]
    public function testUnionWithDuplicatesRaisesException()
    {
        $this->expectException(DuplicateItemException::class);

        (new Collection(['value1', 'value2', 'value3']))->union(['value1', 'value1']);
    }

    #[Group("collection")]
    #[DataProvider('methods')]
    public function testMutatingMethodsReturnCollectionInstance(string $method, ...$args)
    {
        $col = new Collection(['value1', 'value2', 'value3']);
        $ret = $col->$method(...$args);

        $this->assertInstanceOf($col->getCollectionClass(), $ret);
    }

    public static function methods(): array
    {
        return [
            ['keys',],
            ['values',],
            ['filter', fn ($v, $k) => $v],
            ['map', fn ($v, $k) => str_repeat($v, $k)],
        ];
    }
}
