<?php

namespace Somnambulist\Collection\Tests\Behaviours\Export;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class ToArrayTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Export
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Export\ToArrayTest
 */
class ToArrayTest extends TestCase
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
}
