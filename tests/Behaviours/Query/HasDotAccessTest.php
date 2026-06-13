<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\MyObject;
use Somnambulist\Components\Collection\Tests\Fixtures\MyObject2;

class HasDotAccessTest extends TestCase
{

    #[Group("walker")]
    #[Group("has")]
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

    #[Group("walker")]
    #[Group("has")]
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

    #[Group("walker")]
    #[Group("has-none")]
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

    #[Group("walker")]
    #[Group("has")]
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

    #[Group("walker")]
    #[Group("has-any")]
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

    #[Group("walker")]
    #[Group("has")]
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
}
