<?php

namespace Somnambulist\Collection\Tests\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\MyObject;

/**
 * Class CollectionAccessorsTest
 *
 * @package    Somnambulist\Collection\Tests\Collection
 * @subpackage Somnambulist\Collection\Tests\Collection\CollectionAccessorsTest
 */
class CollectionAccessorsTest extends TestCase
{

    /**
     * @group accessors
     */
    public function testAll()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => 'test',
            'test-abe' => 'test',
            'test-abf' => 'test',
            'test-3' => 'test',
            'test-4' => 'test',
            'test-10' => 'test',
            'test-zad' => 'test',
        ]);

        $this->assertIsArray($col->all());
    }

    /**
     * @group accessors
     * @group extract
     */
    public function testExtract()
    {
        $collection = new Collection([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]);

        $result = $collection->extract('name');

        $this->assertEquals(['Desk', 'Chair'], $result->toArray());
    }

    /**
     * @group accessors
     * @group extract
     */
    public function testExtractWithKey()
    {
        $collection = new Collection([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]);

        $result = $collection->extract('name', 'product_id');

        $this->assertEquals(['prod-100' => 'Desk', 'prod-200' => 'Chair'], $result->toArray());
    }

    /**
     * @group accessors
     * @group extract
     */
    public function testExtractPublicObjectProperties()
    {
        $collection = new Collection([
            new MyObject('test', 'example', 'bob', 'bar'),
            new MyObject('test2', 'example2', 'bob2', 'bar2'),
            new MyObject('test3', 'example3', 'bob3', 'bar3'),
        ]);

        $result = $collection->extract('foo');

        $this->assertEquals(['test', 'test2', 'test3'], $result->toArray());
    }

    /**
     * @group accessors
     * @group extract
     */
    public function testExtractViaObjectGetMethod()
    {
        $collection = new Collection([
            new MyObject('test', 'example', 'bob', 'bar'),
            new MyObject('test2', 'example2', 'bob2', 'bar2'),
            new MyObject('test3', 'example3', 'bob3', 'bar3'),
        ]);

        $result = $collection->extract('baz');

        $this->assertEquals(['bob', 'bob2', 'bob3'], $result->toArray());
    }

    /**
     * @group accessors
     * @group extract
     */
    public function testExtractViaObjectMethod()
    {
        $collection = new Collection([
            new MyObject('test', 'example', 'bob', 'bar'),
            new MyObject('test2', 'example2', 'bob2', 'bar2'),
            new MyObject('test3', 'example3', 'bob3', 'bar3'),
        ]);

        $result = $collection->extract('example');

        $this->assertEquals(['bar', 'bar2', 'bar3'], $result->toArray());
    }

    /**
     * @group accessors
     */
    public function testGet()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => 'test',
            'test-abe' => 'test',
        ]);

        $this->assertEquals('test', $col->get('test-abe'));
        $this->assertNull($col->get('abe'));
    }

    /**
     * @group accessors
     */
    public function testGetWithDefaultClosure()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => 'test',
            'test-abe' => 'test',
        ]);

        $this->assertEquals('not-here', $col->get('abe', function () { return 'not-here'; }));
    }

    /**
     * @group accessors
     */
    public function testFirst()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test',
        ]);

        $this->assertEquals('test', $col->first());
    }

    /**
     * @group accessors
     */
    public function testLast()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test-abc',
        ]);

        $this->assertEquals('test-abc', $col->last());
    }

    /**
     * @group accessors
     */
    public function testValue()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => '',
            'test-abe' => null,
        ]);

        $this->assertEquals('test', $col->value('test-1', 'bob'));
        $this->assertEquals('bob', $col->value('test-abc', 'bob'));
        $this->assertEquals('value was null', $col->value('test-abe', function ($value) {
            return is_null($value) ? 'value was null' : 'not null';
        }));
    }
}
