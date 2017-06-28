<?php

namespace Somnambulist\Tests\Collection\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;
use Somnambulist\Tests\Collection\Fixtures\TestClass4;

/**
 * Class CollectionAppendMergeTest
 *
 * @package    Somnambulist\Tests\Collection\Collection
 * @subpackage Somnambulist\Tests\Collection\Collection\CollectionAppendMergeTest
 */
class CollectionAppendMergeTest extends TestCase
{

    /**
     * @group append
     */
    public function testAppend()
    {
        $col = new Collection(new TestClass4());
        $col2 = ['bar' => 'too'];

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);
    }

    /**
     * @group append
     */
    public function testAppendCollection()
    {
        $col = new Collection(new TestClass4());
        $col2 = new Collection(['bar' => 'too']);

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);
    }

    /**
     * @group append
     */
    public function testAppendArrayObject()
    {
        $col = new Collection(new TestClass4());
        $col2 = new \ArrayObject(['bar' => 'too']);

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);
    }

    /**
     * @group append
     */
    public function testAppendNonArray()
    {
        $col = new Collection(new TestClass4());
        $col2 = 'bar';

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);
    }

    /**
     * @group merge
     */
    public function testMerge()
    {
        $col = new Collection([
            'foo' => 'bar'
        ]);

        $col->merge(['foo' => 'baz']);

        $this->assertEquals(['foo' => 'baz'], $col->toArray());
    }

    /**
     * @group merge
     */
    public function testMergeCollections()
    {
        $col = new Collection([
            'foo' => 'bar'
        ]);

        $col->merge(new Collection(['foo' => 'baz']));

        $this->assertEquals(['foo' => 'baz'], $col->toArray());
    }

    /**
     * @group merge
     */
    public function testMergeArrayObjects()
    {
        $col = new Collection([
            'foo' => 'bar'
        ]);

        $col->merge(new \ArrayObject(['foo' => 'baz']));

        $this->assertEquals(['foo' => 'baz'], $col->toArray());
    }

    /**
     * @group merge
     */
    public function testMergeNonArraysAreCastToArrays()
    {
        $col = new Collection([
            'foo' => 'bar'
        ]);

        $col->merge('foo');

        $this->assertEquals(['foo' => 'bar', 'foo'], $col->toArray());
    }
}
