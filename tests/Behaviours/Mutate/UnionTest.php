<?php

namespace Somnambulist\Collection\Tests\Behaviours\Mutate;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class UnionTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Mutate
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Mutate\UnionTest
 */
class UnionTest extends TestCase
{

    /**
     * @group append
     */
    public function testUnion()
    {
        $col = new Collection(new TestClass4());
        $col2 = ['bar' => 'too'];

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);
        $this->assertTrue($col->has('bar'));
    }

    /**
     * @group append
     */
    public function testUnionCollection()
    {
        $col = new Collection(['foo' => 'bar']);
        $col2 = new Collection(['bar' => 'too']);

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);
        $this->assertTrue($col->has('bar'));
    }

    /**
     * @group append
     */
    public function testUnionArrayObject()
    {
        $col = new Collection(new TestClass4());
        $col2 = new \ArrayObject(['bar' => 'too']);

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);
        $this->assertTrue($col->has('bar'));
    }

    /**
     * @group append
     */
    public function testUnionNonArray()
    {
        $col = new Collection(new TestClass4());
        $col2 = 'bar';

        $this->assertCount(1, $col);
        $col->append($col2);
        $this->assertCount(2, $col);
    }
}
