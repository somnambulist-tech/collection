<?php

namespace Somnambulist\Collection\Tests\Collection;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class CollectionExportTest
 *
 * @package    Somnambulist\Collection\Tests\Collection
 * @subpackage Somnambulist\Collection\Tests\Collection\CollectionExportTest
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

        $this->assertIsArray($arr);
        $this->assertEquals([0 => ['foo' => 'bar']], $arr);
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

        $this->assertIsArray($arr);
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

        $this->assertIsString($arr);
        $this->assertEquals('[{"foo":"bar"}]', $arr);
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

        $this->assertIsString($arr);
        $this->assertEquals('{"foo":[1,2,3,4],"bar":[1,2,3,4]}', $arr);
    }
}
