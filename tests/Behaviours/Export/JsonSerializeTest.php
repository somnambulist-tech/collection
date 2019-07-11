<?php

namespace Somnambulist\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class JsonSerializeTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Export
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Export\JsonSerializeTest
 */
class JsonSerializeTest extends TestCase
{

    /**
     * @group export
     */
    public function testJsonSerialize()
    {
        $col = new Collection(new TestClass4());
        $arr = $col->jsonSerialize();

        $this->assertIsString($arr);
        $this->assertEquals([0 => ['foo' => 'bar']], $arr);
    }
}
