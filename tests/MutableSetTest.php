<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Components\Collection\MutableSet as Collection;
use function str_repeat;

/**
 * @group mutable-set
 */
class MutableSetTest extends TestCase
{
    /**
     * @group collection
     */
    public function testCanAddDifferentValues()
    {
        $col = new Collection();
        $col->add('value')->add('value2');

        $this->assertCount(2, $col);
    }

    /**
     * @group collection
     */
    public function testAddDoesNotDuplicateValues()
    {
        $this->expectException(DuplicateItemException::class);

        $col = new Collection();
        $col->add('value')->add('value')->add('value');
    }

    /**
     * @group collection
     */
    public function testAppendDoesNotDuplicateValues()
    {
        $this->expectException(DuplicateItemException::class);

        $col = new Collection();
        $col->append('value', 'value', 'value');
    }

    /**
     * @group collection
     */
    public function testPrependDoesNotDuplicateValues()
    {
        $this->expectException(DuplicateItemException::class);

        $col = new Collection();
        $col->prepend('value', 'value', 'value');
    }

    /**
     * @group collection
     */
    public function testDuplicateItemsOnCreateRaisesException()
    {
        $this->expectException(DuplicateItemException::class);

        new Collection(['value', 'value', 'value']);
    }

    /**
     * @group collection
     */
    public function testMergingWithDuplicatesRaisesException()
    {
        $this->expectException(DuplicateItemException::class);

        (new Collection(['value1', 'value2', 'value3']))->merge(['value2', 'value3']);
    }

    /**
     * @group collection
     */
    public function testUnionWithDuplicatesRaisesException()
    {
        $this->expectException(DuplicateItemException::class);

        (new Collection(['value1', 'value2', 'value3']))->union(['value1', 'value1']);
    }

    /**
     * @group collection
     * @dataProvider methods
     */
    public function testMutatingMethodsReturnCollectionInstance(string $method, ...$args)
    {
        $col = new Collection(['value1', 'value2', 'value3']);
        $ret = $col->$method(...$args);

        $this->assertInstanceOf($col->getCollectionClass(), $ret);
    }

    public function methods(): array
    {
        return [
            ['keys',],
            ['values',],
            ['filter', fn ($v, $k) => $v],
            ['map', fn ($v, $k) => str_repeat($v, $k)],
        ];
    }
}
