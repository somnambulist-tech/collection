<?php

namespace Somnambulist\Collection\Tests\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class CollectionSearchTest
 *
 * @package    Somnambulist\Tests\Collection\Collection
 * @subpackage Somnambulist\Tests\Collection\Collection\CollectionSearchTest
 */
class CollectionSearchTest extends TestCase
{

    /**
     * @group search
     */
    public function testFind()
    {
        $col        = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertEquals('too', $col->find('too'));
        $this->assertFalse($col->find('baz'));
    }

    /**
     * @group search
     */
    public function testFindWithClosure()
    {
        $col        = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertEquals('too', $col->find(function ($value, $key) { return 'bar' === $key; }));
    }

    /**
     * @group search
     */
    public function testKeysSearch()
    {
        $col = new Collection([
            'bar' => 'baz',
            'baz' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEquals(['baz'], $col->keys('foo')->toArray());
        $this->assertEquals(['bar', 'foobar'], $col->keys('baz')->toArray());
    }

    /**
     * @group search
     */
    public function testKeysMatching()
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

        $this->assertCount(9, $col);

        $tmp = $col->keysMatching('/^test-\d+/')->toArray();

        $this->assertCount(5, $tmp);
    }
}
