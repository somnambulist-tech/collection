<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace Somnambulist\Tests\Collection\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;
use Somnambulist\Tests\Collection\Fixtures\MyObject;

/**
 * Class CollectionKeyWalkerTest
 *
 * @package    Somnambulist\Tests\Collection\Collection
 * @subpackage Somnambulist\Tests\Collection\Collection\CollectionKeyWalkerTest
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
