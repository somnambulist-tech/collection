<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\MyObject;
use Somnambulist\Collection\Tests\Fixtures\ProductId;

/**
 * Class ExtractTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\ExtractTest
 */
class ExtractTest extends TestCase
{

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
    public function testExtractWithKeyHandlesObjects()
    {
        $collection = new Collection([
            ['product_id' => new ProductId('prod-100'), 'name' => 'Desk'],
            ['product_id' => new ProductId('prod-200'), 'name' => 'Chair'],
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
}
