<?php

namespace Somnambulist\Collection\Tests\Behaviours\Query;

use PHPUnit\Framework\TestCase;
use Somnambulist\Collection\MutableCollection as Collection;

/**
 * Class ShiftTest
 *
 * @package    Somnambulist\Collection\Tests\Behaviours\Query
 * @subpackage Somnambulist\Collection\Tests\Behaviours\Query\ShiftTest
 */
class ShiftTest extends TestCase
{

    /**
     * @group array
     */
    public function testShift()
    {
        $col = new Collection([
            'foo' => 1,
            'baz' => 2,
            'bob' => 3,
        ]);

        $ret = $col->shift();

        $this->assertEquals(1, $ret);
        $this->assertCount(2, $col);
    }
}
