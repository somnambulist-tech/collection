<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\MyObject;
use Somnambulist\Components\Collection\Tests\Fixtures\MyObject2;
use TypeError;

class GetDotAccessTest extends TestCase
{

    /**
     * @group walker
     */
    public function testGroupDotAccess()
    {
        $col = new Collection([
            'users' => [
                [
                    'name'  => 'test1',
                    'email' => 'test@example.com',
                ],
                [
                    'name'  => 'test2',
                    'email' => 'test@example.com',
                ],
                [
                    'name'  => 'test3',
                    'email' => 'test@example.com',
                ],
            ]
        ]);

        $expected = [
            'test1', 'test2', 'test3',
        ];

        $this->assertEquals($expected, $col->get('users.*.name'));
    }

    /**
     * @group walker
     */
    public function testSelectWholeSubsetUsingDotAccess()
    {
        $col = new Collection([
            'users' => [
                [
                    'name'  => 'test1',
                    'email' => 'test@example.com',
                ],
                [
                    'name'  => 'test2',
                    'email' => 'test@example.com',
                ],
                [
                    'name'  => 'test3',
                    'email' => 'test@example.com',
                ],
            ]
        ]);

        $expected = [
            [
                'name'  => 'test1',
                'email' => 'test@example.com',
            ],
            [
                'name'  => 'test2',
                'email' => 'test@example.com',
            ],
            [
                'name'  => 'test3',
                'email' => 'test@example.com',
            ],
        ];

        $this->assertEquals($expected, $col->get('users.*'));
    }

    /**
     * @group walker
     */
    public function testGroupDotAccessFlattensWhenSelectingAllValues()
    {
        $col = new Collection([
            'users' => [
                [
                    'name'  => 'test1',
                    'email' => 'test@example.com',
                ],
                [
                    'name'  => 'test2',
                    'email' => 'test@example.com',
                ],
                [
                    'name'  => 'test3',
                    'email' => 'test@example.com',
                ],
            ]
        ]);

        $expected = [
            'test1',
            'test@example.com',
            'test2',
            'test@example.com',
            'test3',
            'test@example.com',
        ];

        $this->assertEquals($expected, $col->get('users.*.*'));
    }

    /**
     * @group walker
     */
    public function testGetWithNullRaisesTypeError()
    {
        $col = new Collection([
            'users' => [
                [
                    'name'  => 'test1',
                    'email' => 'test@example.com',
                ],
                [
                    'name'  => 'test2',
                    'email' => 'test@example.com',
                ],
                [
                    'name'  => 'test3',
                    'email' => 'test@example.com',
                ],
            ]
        ]);

        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('Argument #1 ($key) must be of type string|int, null given');
        $this->assertEquals($col, $col->get(null));
    }

    /**
     * @group walker
     * @group get
     */
    public function testDirectDotAccess()
    {
        $col = new Collection([
            'user' => [
                'name'  => 'test1',
                'email' => 'test@example.com',
            ]
        ]);

        $this->assertEquals('test1', $col->get('user.name'));
    }

    /**
     * @group walker
     * @group get
     */
    public function testObjectDotAccess()
    {
        $col = new Collection([
            'objects' => [
                new MyObject('test', 'example', 'bob', 'bar'),
                new MyObject('test2', 'example2', 'bob2', 'bar2'),
                new MyObject('test3', 'example3', 'bob3', 'bar3'),
            ]
        ]);

        $this->assertEquals(['bob', 'bob2', 'bob3'], $col->get('objects.*.baz'));
        $this->assertEquals(['test', 'test2', 'test3'], $col->get('objects.*.foo'));
        $this->assertEquals(['bar', 'bar2', 'bar3'], $col->get('objects.*.example'));
    }

    /**
     * @group walker
     * @group get
     */
    public function testObjectAccess()
    {
        $col = new Collection([
            'test1' => $o1 = new MyObject('test', 'example', 'bob', 'bar'),
            'test2' => $p2 = new MyObject('test2', 'example2', 'bob2', 'bar2'),
            'test3' => $o3 = new MyObject('test3', 'example3', 'bob3', 'bar3'),
        ]);

        $this->assertEquals($o1, $col->get('test1'));
        $this->assertEquals($o3, $col->get('test3'));
    }

    /**
     * @group walker
     * @group get
     */
    public function testDotAccessWithDefault()
    {
        $col = new Collection([
            'objects' => [
                [],
                [],
            ]
        ]);

        $this->assertEquals(['example', 'example'], $ret = $col->get('objects.*.baz', function () {
            return 'example';
        }));
    }

    /**
     * @group walker
     * @group walker-wildcard
     */
    public function testWildcardDotAccessWithDefault()
    {
        $col = new Collection([
            'objects' => [
                'name',
            ]
        ]);

        $this->assertEquals(['name'], $ret = $col->get('objects.*', function () {
            return 'example';
        }));
    }

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
}
