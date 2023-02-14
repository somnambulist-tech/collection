<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\MyObject;
use Somnambulist\Components\Collection\Tests\Fixtures\MyObject2;

class HasDotAccessTest extends TestCase
{

    /**
     * @group walker
     * @group has
     */
    public function testCanTestForKeys()
    {
        $col = new Collection([
            'objects' => [
                new MyObject('test', 'example', 'bob', 'bar'),
                new MyObject('test2', 'example2', 'bob2', 'bar2'),
                new MyObject('test3', 'example3', 'bob3', 'bar3'),
            ]
        ]);

        $this->assertTrue($col->has('objects.*.bar'));
        $this->assertTrue($col->has('objects.*.foo'));
        $this->assertFalse($col->has('objects.*.tester'));
    }

    /**
     * @group walker
     * @group has
     */
    public function testCanTestForMultipleNestedKeys()
    {
        $col = new Collection([
            'objects' => [
                new MyObject('test', 'example', 'bob', 'bar'),
                new MyObject('test2', 'example2', 'bob2', 'bar2'),
                new MyObject('test3', 'example3', 'bob3', 'bar3'),
            ]
        ]);

        $this->assertTrue($col->has('objects.*.bar', 'objects.*.foo'));
        $this->assertFalse($col->has('objects.*.foo','objects.*.tester'));
    }

    /**
     * @group walker
     * @group has-none
     */
    public function testCanTestThatNoKeysAreInNestedKeys()
    {
        $col = new Collection([
            'objects' => [
                new MyObject('test', 'example', 'bob', 'bar'),
                new MyObject('test2', 'example2', 'bob2', 'bar2'),
                new MyObject('test3', 'example3', 'bob3', 'bar3'),
            ]
        ]);

        $this->assertTrue($col->hasNoneOf('objects.*.tester', 'objects.*.foofoo'));
        $this->assertFalse($col->hasNoneOf('objects.*.tester','objects.*.foo'));
    }

    /**
     * @group walker
     * @group has
     */
    public function testCanTestForMultipleNestedKeysOfMixedObjects()
    {
        $col = new Collection([
            'objects' => [
                new MyObject('test', 'example', 'bob', 'bar'),
                new MyObject2('test2', 'example2'),
                new MyObject('test3', 'example3', 'bob3', 'bar3'),
            ]
        ]);

        $this->assertTrue($col->has('objects.*.foo'));
        $this->assertFalse($col->has('objects.*.bar','objects.*.example'));
    }

    /**
     * @group walker
     * @group has-any
     */
    public function testCanTestForAnyMultipleNestedKeysOfMixedObjects()
    {
        $col = new Collection([
            'objects' => [
                new MyObject('test', 'example', 'bob', 'bar'),
                new MyObject2('test2', 'example2'),
                new MyObject('test3', 'example3', 'bob3', 'bar3'),
            ]
        ]);

        $this->assertTrue($col->hasAnyOf('objects.*.foo'));
        $this->assertTrue($col->hasAnyOf('objects.*.bar','objects.*.example'));
    }

    /**
     * @group walker
     * @group has
     */
    public function testCanTestForMultipleKeys()
    {
        $col = new Collection([
            'test1' => $o1 = new MyObject('test', 'example', 'bob', 'bar'),
            'test2' => $p2 = new MyObject('test2', 'example2', 'bob2', 'bar2'),
            'test3' => $o3 = new MyObject('test3', 'example3', 'bob3', 'bar3'),
        ]);

        $this->assertTrue($col->has('test1', 'test3'));
        $this->assertFalse($col->has('test4', 'test5'));
    }

//    /**
//     * Disabling for now as this is basically extract...
//     * @group walker
//     * @group with
//     */
//    public function testCanGetMultipleKeysValues()
//    {
//        $col = new Collection([
//            'objects' => [
//                new MyObject('test', 'example', 'bob', 'bar'),
//                new MyObject('test2', 'example2', 'bob2', 'bar2'),
//                new MyObject('test3', 'example3', 'bob3', 'bar3'),
//            ]
//        ]);
//
//        $expected = [
//            "objects.*.bar" => [
//                0 => "example",
//                1 => "example2",
//                2 => "example3",
//            ],
//            "objects.*.foo" => [
//                0 => "test",
//                1 => "test2",
//                2 => "test3",
//            ],
//        ];
//
//        $this->assertEquals($expected, $col->with('objects.*.bar', 'objects.*.foo')->toArray());
//    }
}
