<?php

namespace Somnambulist\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class ToJsonTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Export
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Export\ToJsonTest
 */
class ToJsonTest extends TestCase
{

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
