<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;

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
