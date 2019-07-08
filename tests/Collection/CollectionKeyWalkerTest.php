<?php

namespace Somnambulist\Collection\Tests\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\MyObject;

/**
 * Class CollectionKeyWalkerTest
 *
 * @package    Somnambulist\Collection\Tests\Collection
 * @subpackage Somnambulist\Collection\Tests\Collection\CollectionKeyWalkerTest
 */
class CollectionKeyWalkerTest extends TestCase
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
    public function testGetWithNullReturnsAll()
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

        $this->assertEquals($col, $col->get(null));
    }

    /**
     * @group walker
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
     */
    public function testCanAccessKeysViaDotAccessorWithAtSign()
    {
        $col = new Collection([
            'key.value.id'          => 123456,
            'key.value.description' => 'foobar',
        ]);

        $this->assertEquals(123456, $col->get('@key.value.id'));
        $this->assertEquals('foobar', $col->get('@key.value.description'));
        $this->assertEquals('foobar', $col['key.value.description']);
    }

    /**
     * @group walker
     */
    public function testCanAccessKeysViaDotAccessorWithAtSignSupportsDefault()
    {
        $col = new Collection([
            'key.value.description' => 'foobar',
        ]);

        $this->assertEquals('my-id-here', $col->get('@key.value.id', 'my-id-here'));
    }
}
