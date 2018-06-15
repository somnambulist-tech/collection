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

namespace Somnambulist\Tests\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;
use Somnambulist\Collection\Immutable;
use Somnambulist\Tests\Collection\Fixtures\TestClass1;
use Somnambulist\Tests\Collection\Fixtures\TestClass3;
use Somnambulist\Tests\Collection\Fixtures\TestClass4;

/**
 * Class CollectionTest
 *
 * @package    Somnambulist\Tests\Domain\Collection
 * @subpackage Somnambulist\Tests\Domain\Collection\CollectionTest
 */
class CollectionTest extends TestCase
{

    /**
     * @group collection
     */
    public function testAdd()
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
        $col = new Collection();
        $col->add('value')->add('value')->add('value');

        $this->assertCount(1, $col);
    }

    /**
     * @group collection
     */
    public function testAssert()
    {
        $col = new Collection(['bar' => 'too', 'baz' => 34, 'bob' => 'example', 'test' => 'case']);
        $this->assertTrue($col->assert(function ($item, $key) {
            return !empty($item);
        }));

        $col = new Collection(['bar' => 'too', 'baz' => 34, 'bob' => 'example', 'test' => 'case']);
        $this->assertFalse($col->assert(function ($item, $key) {
            return $key === 'foo';
        }));
    }

    /**
     * @group collection
     */
    public function testCallAndCollect()
    {
        $col = new Collection([
            'bar' => new TestClass3(), 'bob' => new TestClass3(),
        ]);

        $ret = $col->call(function ($v, $k) {
            /** @var TestClass3 $v */
            return $v->toJson();
        });

        $expected = new Collection([
            'bar' => '{"foo":"bar"}',
            'bob' => '{"foo":"bar"}',
        ]);

        $this->assertEquals($expected, $ret);
    }

    /**
     * @group collection
     */
    public function testContains()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test',
        ]);

        $this->assertTrue($col->contains('test'));
        $this->assertFalse($col->contains(1234));
    }

    /**
     * @group collection
     */
    public function testDiff()
    {
        $col1 = Collection::collect(["a" => "green", "red", "blue", "red"]);
        $col2 = Collection::collect(["b" => "green", "yellow", "red"]);

        $diff = $col1->diff($col2);

        $this->assertCount(1, $diff);
        $this->assertContains('blue', $diff);
    }

    /**
     * @group collection
     */
    public function testDiffKeys()
    {
        $col1 = Collection::collect(['blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4]);
        $col2 = Collection::collect(['green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8]);

        $diff = $col1->diffKeys($col2);

        $this->assertCount(2, $diff);
        $this->assertArrayHasKey('red', $diff);
        $this->assertArrayHasKey('purple', $diff);
    }

    /**
     * @group collection
     */
    public function testEach()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);
        $result = [];

        $col->each(function ($item, $key) use (&$result) {
            if ($item < 3) {
                $result[$key] = $item;
            }
        });

        $this->assertCount(2, $result);
        $this->assertEquals(['foo' => 1, 'baz' => 2], $result);
    }

    /**
     * @group collection
     */
    public function testExcept()
    {
        $col = new Collection(['bar' => 'too', 'baz' => 34, 'bob' => 'example', 'test' => 'case']);
        $this->assertCount(4, $col);

        $col2 = $col->except('baz', 'test');

        $this->assertCount(2, $col2);
        $this->assertArrayHasKey('bar', $col2);
        $this->assertArrayHasKey('bob', $col2);
    }

    /**
     * @group collection
     */
    public function testExceptWithMixedKeys()
    {
        $col = new Collection(['bar' => 'too', 0 => 34, 'bob' => 'example', 'test' => 'case']);
        $this->assertCount(4, $col);

        $col2 = $col->except('baz', 'test');

        $this->assertCount(3, $col2);
        $this->assertArrayHasKey('bar', $col2);
        $this->assertArrayHasKey('bob', $col2);
        $this->assertArrayHasKey(0, $col2);
    }

    /**
     * @group collection
     */
    public function testFill()
    {
        $col = Collection::collect([])->fill(0, 10, 'var');

        $this->assertCount(10, $col);
        $this->assertContains('var', $col);
    }

    /**
     * @group collection
     */
    public function testFillKeysWith()
    {
        $col = Collection::collect(['foo', 'bar', 'baz'])->fillKeysWith('test');

        $this->assertCount(3, $col);
        $this->assertArrayHasKey('foo', $col);
        $this->assertArrayHasKey('bar', $col);
        $this->assertArrayHasKey('baz', $col);
        $this->assertEquals('test', $col['bar']);
    }

    /**
     * @group collection
     */
    public function testFlatten()
    {
        $obj      = new \stdClass();
        $obj->bar = 'baz';

        $col = new Collection(new TestClass1());
        $col->set('foobar', new Collection($obj));
        $col->get('foobar')->set('foobar2', new Collection(['you' => 'me']));

        $tmp = $col->flatten();

        $this->assertCount(3, $tmp);
        $this->assertEquals(['foo' => 'bar', 'bar' => 'baz', 'you' => 'me'], $tmp->toArray());
    }

    /**
     * @group collection
     */
    public function testFilter()
    {
        $col = new Collection([
            'foo' => 'bar',
            'baz' => 'bar',
            'bob' => 'baz',
        ]);

        $ret = $col->filter(function ($var) {
            return $var == 'baz';
        });

        $this->assertCount(1, $ret);
        $this->assertEquals('bob', $ret->keys()[0]);
    }

    /**
     * @group collection
     */
    public function testFlip()
    {
        $col = new Collection([
            'foo', 'bar', 'baz',
        ]);

        $this->assertEquals(['foo' => 0, 'bar' => 1, 'baz' => 2], $col->flip()->toArray());
    }

    /**
     * @group collection
     */
    public function testFreezeReturnsImmutable()
    {
        $col = new Collection();

        $this->assertInstanceOf(Immutable::class, $col->freeze());
    }

    /**
     * @group collection
     */
    public function testHas()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => 'test',
            'test-abc' => 'test',
            'test-abe' => 'test',
        ]);

        $this->assertTrue($col->has('test-abe'));
        $this->assertFalse($col->has('abe'));
    }

    /**
     * @group collection
     */
    public function testHasValueFor()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test',
        ]);

        $this->assertTrue($col->hasValueFor('test-abe'));
        $this->assertFalse($col->hasValueFor('test-2'));
        $this->assertFalse($col->hasValueFor('test-abc'));
    }

    /**
     * @group collection
     */
    public function testKeys()
    {
        $col = new Collection([
            'bar' => 'baz',
            'baz' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEquals(['bar', 'baz', 'foobar'], $col->keys()->toArray());
    }

    /**
     * @group collection
     */
    public function testKeysStrict()
    {
        $col = new Collection([
            '123' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEmpty($col->keys(123, true)->toArray());
    }

    /**
     * @group collection
     */
    public function testImplode()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test-abc',
        ]);

        $this->assertEquals('test|||test-abc', $col->implode('|'));
    }

    /**
     * @group collection
     */
    public function testImplodeKeys()
    {
        $col = new Collection([
            'test-1' => 'test',
            'test-2' => null,
            'test-abc' => false,
            'test-abe' => 'test-abc',
        ]);

        $this->assertEquals('test-1|test-2|test-abc|test-abe', $col->implodeKeys('|'));
    }

    /**
     * @group collection
     */
    public function testIntersect()
    {
        $col = Collection::collect(['foo', '  bar', '  baz  ']);

        $this->assertCount(3, $col);

        $col = $col->trim();

        $this->assertContains('foo', $col);
        $this->assertContains('bar', $col);
        $this->assertContains('baz', $col);
    }

    /**
     * @group collection
     */
    public function testInvoke()
    {
        $col = new Collection([
            new Collection([
                'foo' => 'bar',
            ]),
            new Collection([
                'foo' => 'bar',
            ]),
            new Collection([
                'foo' => 'bar',
            ]),
        ]);

        $ret = $col->invoke('set', ['foo', 'baz']);

        foreach ($ret as $col) {
            /** @var Collection $col */
            $this->assertEquals('baz', $col->get('foo'));
        }
    }

    /**
     * @group collection
     */
    public function testInvokeWithSingleArg()
    {
        $col = new Collection([
            new Collection([
                'foo' => 'bar',
            ]),
            new Collection([
                'foo' => 'bar',
            ]),
            new Collection([
                'foo' => 'bar',
            ]),
        ]);

        $ret = $col->invoke('remove', ['foo']);

        foreach ($ret as $col) {
            $this->assertCount(0, $col);
        }
    }

    /**
     * @group collection
     */
    public function testMap()
    {
        $col = new Collection([
            'foo' => 'bar',
            'baz' => 'bar',
            'bob' => 'baz',
        ]);

        $ret = $col->map(function ($var) {
            return $var = 'baz' . $var;
        });

        $this->assertCount(3, $ret);
        foreach ($ret as $key => $value) {
            $this->assertContains('baz', $value);
        }
    }

    /**
     * @group collection
     */
    public function testOnly()
    {
        $col1 = Collection::collect([
            'blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4, 'black' => 5, 'indigo' => 6, 'yellow' => 7, 'cyan' => 8
        ]);

        $diff = $col1->only('red', 'green', 'blue');

        $this->assertCount(3, $diff);
        $this->assertEquals(['red' => 2, 'green' => 3, 'blue' => 1], $diff->toArray());

        $diff = $col1->only(['red', 'green', 'blue']);

        $this->assertCount(3, $diff);
        $this->assertEquals(['red' => 2, 'green' => 3, 'blue' => 1], $diff->toArray());
    }

    /**
     * @group collection
     */
    public function testOnlyWithMixedKeys()
    {
        $col1 = Collection::collect([
            0 => 1, 'red' => 2, 'green' => 3, 'purple' => 4, 'black' => 5, 'indigo' => 6, 'yellow' => 7, 'cyan' => 8
        ]);

        $diff = $col1->only('red', 'green', 'blue');

        $this->assertCount(2, $diff);
        $this->assertEquals(['red' => 2, 'green' => 3], $diff->toArray());
    }

    /**
     * @group collection
     */
    public function testPad()
    {
        $col = new Collection();
        $col->pad(10, 'a');

        $this->assertCount(10, $col);
    }

    /**
     * @group collection
     * @group pipe
     */
    public function testPipeWithMethod()
    {
        $ud = new class {
            public function decorate(Collection $object)
            {
                $object->get('context')->set('user', 'ROOT');

                return $object;
            }
        };
        $sd = new class {
            public function decorate(Collection $object)
            {
                $object->get('context')->set('server', 'testing.example.example');

                return $object;
            }
        };

        $col = new Collection();
        $col->add($ud)->add($sd);

        $events = new Collection([
            new Collection(['name' => 'event 1', 'payload' => [], 'context' => new Collection()]),
            new Collection(['name' => 'event 2', 'payload' => [], 'context' => new Collection()]),
        ]);

        $decorated = $col->pipe($events, 'decorate');

        foreach ($decorated as $event) {
            $this->assertCount(2, $event->get('context'));
            $this->assertEquals('ROOT', $event->get('context')->get('user'));
            $this->assertEquals('testing.example.example', $event->get('context')->get('server'));
        }
    }

    /**
     * @group collection
     * @group pipe
     */
    public function testPipeWithClosure()
    {
        $ud = new class {
            public function decorate(Collection $object)
            {
                $object->get('context')->set('user', 'ROOT');

                return $object;
            }
        };
        $sd = new class {
            public function decorate(Collection $object)
            {
                $object->get('context')->set('server', 'testing.example.example');

                return $object;
            }
        };

        $col = new Collection();
        $col->add($ud)->add($sd);

        $events = new Collection([
            new Collection(['name' => 'event 1', 'payload' => [], 'context' => new Collection()]),
            new Collection(['name' => 'event 2', 'payload' => [], 'context' => new Collection()]),
        ]);

        $decorated = $col->pipe($events, function ($operator, $item, $key) {
            return $operator->decorate($item);
        });

        foreach ($decorated as $event) {
            $this->assertCount(2, $event->get('context'));
            $this->assertEquals('ROOT', $event->get('context')->get('user'));
            $this->assertEquals('testing.example.example', $event->get('context')->get('server'));
        }
    }

    /**
     * @group collection
     */
    public function testReduce()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);
        $initial = 0;

        $ret = $col->reduce(function ($carry, $var) {
            return $carry + ($var * $var);
        }, $initial);

        $this->assertNotNull($ret);
        $this->assertEquals(14, $ret);
    }

    /**
     * @group collection
     */
    public function testRemove()
    {
        $col = new Collection();
        $col->set('key', 'value');

        $this->assertTrue($col->has('key'));

        $col->remove('key');

        $this->assertCount(0, $col);
    }

    /**
     * @group collection
     */
    public function testRemoveElement()
    {
        $col = new Collection();
        $col->set('key', 'value');

        $this->assertTrue($col->has('key'));

        $col->removeElement('value');

        $this->assertCount(0, $col);
    }

    /**
     * @group collection
     */
    public function testRemoveEmpty()
    {
        $col = Collection::collect(['foo', 'bar', null, 'baz', '', false, 0]);

        $this->assertCount(7, $col);

        $col = $col->removeEmpty();

        $this->assertCount(4, $col);
    }

    /**
     * @group collection
     */
    public function testRemoveNulls()
    {
        $col = Collection::collect(['foo', 'bar', null, 'baz', null]);

        $this->assertCount(5, $col);

        $col = $col->removeNulls();

        $this->assertCount(3, $col);
    }

    /**
     * @group collection
     */
    public function testReset()
    {
        $col = new Collection(new TestClass4());

        $this->assertCount(1, $col);
        $col->reset();
        $this->assertCount(0, $col);
    }

    /**
     * @group collection
     */
    public function testReverse()
    {
        $col = new Collection([
            'bar' => 'baz',
            'baz' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEquals(['foobar' => 'baz', 'baz' => 'foo', 'bar' => 'baz'], $col->reverse()->toArray());
    }

    /**
     * @group collection
     */
    public function testSerialize()
    {
        $col = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $tmp = serialize($col);
        $col = unserialize($tmp);

        $this->assertInstanceOf(Collection::class, $col);
        $this->assertCount(2, $col);
    }

    /**
     * @group collection
     */
    public function testSet()
    {
        $col = new Collection();
        $col->set('key', 'value');

        $this->assertTrue($col->has('key'));
        $this->assertEquals('value', $col->get('key'));
    }

    /**
     * @group collection
     * @deprecated
     * @expectedException \PHPUnit\Framework\Error\Deprecated
     */
    public function testSetWithArrayReplacesItems()
    {
        $col = new Collection();
        $col->set('key', 'value');

        $this->assertTrue($col->has('key'));

        $col->set(['foo' => 'bar', 'bar' => 'baz']);

        $this->assertCount(2, $col);
        $this->assertArrayNotHasKey('key', $col);
    }

    /**
     * @group collection
     */
    public function testShuffle()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);

        $ret = $col->shuffle();

        $this->assertInstanceOf(Collection::class, $ret);
    }

    /**
     * @group collection
     */
    public function testSlice()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);

        $ret = $col->slice(2);

        $this->assertEquals(['bob' => 3], $ret->toArray());
    }

    /**
     * @group collection
     */
    public function testUnique()
    {
        $col = new Collection([
            'bar' => 'baz',
            'baz' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEquals(['bar' => 'baz', 'baz' => 'foo'], $col->unique()->toArray());
    }

    /**
     * @group collection
     */
    public function testValues()
    {
        $col = new Collection([
            'bar' => 'baz',
            'baz' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEquals(['baz', 'foo', 'baz'], $col->values()->toArray());
    }

    /**
     * @group collection
     */
    public function testWalk()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);

        $ret = $col->walk(function (&$item, $key, $prefix) {
            $item = $prefix . $item;
        }, 'foo bars: ');

        $this->assertCount(3, $ret);
        foreach ($ret as $key => $value) {
            $this->assertContains('foo bars: ', $value);
        }
    }
}
