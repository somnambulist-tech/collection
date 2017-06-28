<?php

namespace Somnambulist\Tests\Collection\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;
use Somnambulist\Tests\Collection\Fixtures\TestClass4;

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

        $this->assertNotFalse($col->find('bar'));
        $this->assertFalse($col->find('baz'));
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
    public function testMatch()
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

        $tmp = $col->match('/^test-\d+/')->toArray();

        $this->assertCount(5, $tmp);
    }

    /**
     * @group search
     */
    public function testSearch()
    {
        $col        = new Collection(new TestClass4());
        $col['bar'] = 'too';

        $this->assertNotFalse($col->search('bar'));
        $this->assertFalse($col->search('baz'));
    }
}
