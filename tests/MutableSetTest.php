<?php

namespace Somnambulist\Collection\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Exceptions\DuplicateItemException;
use Somnambulist\Collection\MutableSet as Collection;

/**
 * Class MutableCollectionTest
 *
 * @package    Somnambulist\Collection\Tests
 * @subpackage Somnambulist\Collection\Tests\MutableCollectionTest
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
}
