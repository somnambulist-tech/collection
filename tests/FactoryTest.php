<?php

namespace Somnambulist\Collection\Tests;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Utils\FactoryUtils as Factory;

/**
 * Class FactoryTest
 *
 * @package    Somnambulist\Collection\Tests
 * @subpackage Somnambulist\Collection\Tests\FactoryTest
 */
class FactoryTest extends TestCase
{

    public function testExplode()
    {
        $array1 = array("a" => "green", "red", "blue");
        $array2 = array("b" => "green", "yellow", "red");
        $col = Collection::collect($array1)->intersect($array2);

        $this->assertCount(2, $col);
        $this->assertContains('green', $col);
        $this->assertContains('red', $col);
    }

    public function testCreateFromString()
    {
        $col = Factory::createFromString('foo=1&bar=baz&baz=2,3,4');

        $this->assertCount(3, $col);
        $this->assertArrayHasKey('foo', $col);
        $this->assertArrayHasKey('bar', $col);
        $this->assertArrayHasKey('baz', $col);
        $this->assertEquals([2, 3, 4], $col['baz']->toArray());

        $col = Factory::createFromString('trim|required|min:10|max:200|in:foo,bar,baz', '|', ':');

        $this->assertCount(5, $col);
        $this->assertArrayHasKey('trim', $col);
        $this->assertArrayHasKey('required', $col);
        $this->assertArrayHasKey('min', $col);
        $this->assertEquals(10, $col->get('min'));
        $this->assertArrayHasKey('max', $col);
        $this->assertEquals(200, $col->get('max'));
        $this->assertArrayHasKey('in', $col);
        $this->assertEquals(['foo','bar','baz'], $col['in']->toArray());
    }

    public function testCreateFromUrl()
    {
        $col = Factory::createFromUrl('http://username:password@hostname:9090/path?arg=value#anchor');

        $this->assertEquals('username', $col->get('user'));
        $this->assertEquals('password', $col->get('pass'));
        $this->assertEquals('hostname', $col->get('host'));
        $this->assertEquals('9090', $col->get('port'));
        $this->assertEquals('/path', $col->get('path'));
        $this->assertEquals('anchor', $col->get('fragment'));
        $this->assertInstanceOf(Collection::class, $col->get('query'));
        $this->assertEquals('value', $col->get('query')->get('arg'));
    }

    public function testCreateFromUrlQuery()
    {
        $col = Factory::createFromUrlQuery('single=value&arg[]=value&arg[]=value2&foo&bar');

        $this->assertEquals('value', $col->get('single'));
        $this->assertCount(2, $col->get('arg'));
        $this->assertEquals('', $col->get('foo'));
        $this->assertEquals('', $col->get('bar'));
    }

    public function testCreateFromIniString()
    {
        // from: http://ca.php.net/manual/en/function.parse-ini-string.php#111845
        $ini = '
[simple]
val_one = "some value"
val_two = 567

[array]
val_arr[] = "arr_elem_one"
val_arr[] = "arr_elem_two"
val_arr[] = "arr_elem_three"

[array_keys]
val_arr_two[6] = "key_6"
val_arr_two[some_key] = "some_key_value"
';

        $col = Factory::createFromIniString($ini, true);

        $this->assertEquals('some value', $col->simple->get('val_one'));
        $this->assertCount(3, $col->get('array')->get('val_arr'));
    }
}
