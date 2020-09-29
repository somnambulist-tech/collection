<?php

declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Map;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass1;
use stdClass;

/**
 * Class FlattenTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Map
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Map\FlattenTest
 */
class FlattenTest extends TestCase
{

    /**
     * @group collection
     * @group flatten
     */
    public function testFlatten()
    {
        $obj      = new stdClass();
        $obj->bar = 'baz';

        $col = new Collection(new TestClass1());
        $col->set('foobar', new Collection($obj));
        $col->get('foobar')->set('foobar2', new Collection(['you' => 'me']));

        $tmp = $col->flatten();

        $this->assertCount(3, $tmp);
        $this->assertEquals([0 => ['foo' => 'bar'], 'bar' => 'baz', 'you' => 'me'], $tmp->toArray());
    }

    /**
     * @group collection
     * @group flatten
     */
    public function testFlattenWithDotKeys()
    {
        $obj      = new stdClass();
        $obj->bar = 'baz';

        $col = new Collection(new TestClass1());
        $col->set('foobar', new Collection($obj));
        $col->get('foobar')->set('foobar2', new Collection(['you' => 'me']));

        $tmp = $col->flattenWithDotKeys();

        $this->assertCount(3, $tmp);
        $this->assertEquals([0 => ['foo' => 'bar'], 'foobar.bar' => 'baz', 'foobar.foobar2.you' => 'me'], $tmp->toArray());
    }

}
