<?php

namespace Somnambulist\Tests\Collection\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\Collection;
use Somnambulist\Tests\Collection\Fixtures\TestClass4;

/**
 * Class CollectionExportTest
 *
 * @package    Somnambulist\Tests\Collection\Collection
 * @subpackage Somnambulist\Tests\Collection\Collection\CollectionExportTest
 */
class CollectionExportTest extends TestCase
{

    /**
     * @group export
     */
    public function testToArray()
    {
        $col = new Collection(new TestClass4());
        $arr = $col->toArray();

        $this->assertInternalType('array', $arr);
        $this->assertEquals(['foo' => 'bar'], $arr);
    }

    /**
     * @group export
     */
    public function testToArrayOfCollections()
    {
        $col = new Collection([
            'foo' => new Collection([1, 2, 3, 4]),
            'bar' => new Collection([1, 2, 3, 4]),
        ]);
        $arr = $col->toArray();

        $this->assertInternalType('array', $arr);
        $this->assertEquals(['foo' => [1, 2, 3, 4], 'bar' => [1, 2, 3, 4]], $arr);
    }

    /**
     * @group export
     */
    public function testToQueryString()
    {
        $col = new Collection([
            'foo' => 'bar',
            'bar' => ['baz1', 'baz2'],
            'baz' => true,
        ]);
        $str = $col->toQueryString();

        $this->assertEquals('foo=bar&bar%5B0%5D=baz1&bar%5B1%5D=baz2&baz=1', $str);
    }

    /**
     * @group export
     */
    public function testToJson()
    {
        $col = new Collection(new TestClass4());
        $arr = $col->toJson();

        $this->assertInternalType('string', $arr);
        $this->assertEquals('{"foo":"bar"}', $arr);
    }

    /**
     * @group export
     */
    public function testToJsonOfCollections()
    {
        $col = new Collection([
            'foo' => new Collection([1, 2, 3, 4]),
            'bar' => new Collection([1, 2, 3, 4]),
        ]);
        $arr = $col->toJson();

        $this->assertInternalType('string', $arr);
        $this->assertEquals('{"foo":[1,2,3,4],"bar":[1,2,3,4]}', $arr);
    }
}
