<?php

namespace Somnambulist\Components\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

/**
 * Class JsonSerializeTest
 *
 * @package    Somnambulist\Components\Collection\Tests\Behaviours\Export
 * @subpackage Somnambulist\Components\Collection\Tests\Behaviours\Export\JsonSerializeTest
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

        $this->assertIsArray($arr);
        $this->assertEquals([0 => ['foo' => 'bar']], $arr);
    }
}
