<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

/**
 * Class KeysTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Query\KeysTest
 */
class KeysTest extends TestCase
{

    /**
     * @group collection
     * @group keys
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
     * @group keys
     */
    public function testKeysIsAlwaysStrictSearch()
    {
        $col = new Collection([
            '123' => 'foo',
            'foobar' => 'baz',
        ]);

        $this->assertEmpty($col->keys(123)->toArray());
    }

    /**
     * @group collection
     * @group keys
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
}
