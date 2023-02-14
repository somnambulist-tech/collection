<?php declare(strict_types=1);

namespace Somnambulist\Components\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Collection\MutableCollection as Collection;
use Somnambulist\Components\Collection\Tests\Fixtures\TestClass4;

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
