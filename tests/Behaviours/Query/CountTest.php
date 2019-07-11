<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;
use Somnambulist\Collection\Tests\Fixtures\TestClass4;

/**
 * Class CountTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\CountTest
 */
class CountTest extends TestCase
{

    /**
     * @group array
     */
    public function testCount()
    {
        $col = new Collection(new TestClass4());
        $col->bar = 'too';

        $this->assertCount(2, $col);
        $this->assertEquals(2, $col->count());
    }
}
